<?php

namespace lib\Controllers;

use lib\Objects\PowerTrail\PowerTrail;
use lib\Objects\PowerTrail\Log;
use Utils\Database\OcDb;

class PowerTrailController
{

    const MINIMUM_PERCENT_REQUIRED = 66.6;

    private $config;
    private $serverUrl;

    function __construct()
    {
        include __DIR__ . '/../settings.inc.php';
        $this->config = $powerTrailMinimumCacheCount;
        $this->serverUrl = $absolute_server_URI;

        foreach ($this->config['old'] as &$date) {
            $date['dateFrom'] = strtotime($date['dateFrom']);
            $date['dateTo'] = strtotime($date['dateTo']);
        }
    }

    public static function getEntryTypes(){
        return array (
            Log::TYPE_COMMENT => array ( //comment
                'translate' => 'pt056',
                'color' => '#000000',
            ),
            Log::TYPE_CONQUESTED => array ( // conquested
                'translate' => 'pt057',
                'color' => '#00CC00',
            ),
            Log::TYPE_OPENING => array ( // geoPath Publishing
                'translate' => 'pt214',
                'color' => '#0000CC',
            ),
            Log::TYPE_DISABLING => array ( // geoPath temp. closed
                'translate' => 'pt216',
                'color' => '#CC0000',
            ),
            Log::TYPE_CLOSING => array ( // geoPath Closure (permanent)
                'translate' => 'pt213',
                'color' => '#CC0000',
            ),
            Log::TYPE_ADD_WARNING => array ( // oc team comment (permanent)
                'translate' => 'pt237',
                'color' => '#CC0000',
            ),
        );
    }

    /**
     * used to set geoPath status to inactive, when has too small amount of caches,
     * etc.
     */
    public function cleanPowerTrailsCronjob()
    {
        /* disabled until full automated geopaths-calening machine works finished
        $getPtQuery = 'SELECT * FROM `PowerTrail` WHERE `status` =1';
        $db = OcDb::instance();
        $s = $db->simpleQuery($getPtQuery);
        $ptToClean = $db->dbResultFetchAll($s);
        foreach ($ptToClean as $dbRow) {
            $powerTrail = new PowerTrail(array('dbRow' => $dbRow));
            $powerTrail->setPowerTrailConfiguration($this->config)->checkCacheCount();
            if (!$powerTrail->disableUncompletablePt($this->serverUrl)) {
                $powerTrail->disablePowerTrailBecauseCacheCountTooLow();
            }
        }
        */
        $this->archiveAbandonPowerTrails();
        $this->freeCacheCandidates();
    }

    private function archiveAbandonPowerTrails()
    {
        $db = OcDb::instance();
        $archiveAbandonQuery = 'SELECT `id` FROM `PowerTrail` WHERE `id` NOT IN (SELECT PowerTrailId FROM `PowerTrail_owners` WHERE 1 GROUP BY PowerTrailId)';
        $s = $db->simpleQuery($archiveAbandonQuery);
        if ($db->rowCount($s) > 0) { // close all abandon geoPaths
            $ptToClose = $db->dbResultFetchAll($s);
            $updateArr = array();
            foreach ($ptToClose as $pt) {
                array_push($updateArr, $pt['id']);
            }
            $updateArr = implode(',', $updateArr);
            $updQuery = 'UPDATE `PowerTrail` SET `status` =3 WHERE `id` IN ( :1 )';
            $db->multiVariableQuery($updQuery, $updateArr);
        }
    }

    private function freeCacheCandidates()
    {
        $db = OcDb::instance();
        $query = 'DELETE FROM `PowerTrail_cacheCandidate` WHERE `date` < DATE_SUB(curdate(), INTERVAL 2 WEEK)';
        $db->simpleQuery($query);
    }

    /**
     * here power Trail status
     */
    public static function getPowerTrailStatus(){
        return array (
            1 => array ( // public
                'translate' => 'pt006',
            ),
            2 => array ( // not yet available
                'translate' => 'pt007',
            ),
            4 => array ( // service
                'translate' => 'pt219',
            ),
            3 => array ( // archived
                'translate' => 'pt212',
            ),
        );
    }

}
