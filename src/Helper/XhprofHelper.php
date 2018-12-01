<?php
declare(strict_types = 1);

namespace App\Helper;

/**
 * Class XhprofHelper
 * @package App\Modules\Core\Helper
 *
 * Class-helper for XHProf extension.
 */
class XhprofHelper
{

    /**
     * Starts xhprof session.
     *
     * @return void
     */
    public static function start(): void
    {
        \xhprof_enable(\XHPROF_FLAGS_CPU + \XHPROF_FLAGS_MEMORY);
        include_once \getenv('XHPROF_ROOT') . '/xhprof_lib/utils/xhprof_lib.php';
        include_once \getenv('XHPROF_ROOT') . '/xhprof_lib/utils/xhprof_runs.php';
    }

    /**
     * Stop xhprof session, store it to the hard drive and current return run ID or URI for current run ID.
     *
     * @param bool $dumpUri Indicate if URI for current run ID should be dumped.
     * @param bool $returnRunId Indicate whether URI or run ID should be returned.
     *
     * @return string
     */
    public static function stop(bool $dumpUri = false, bool $returnRunId = true): string
    {
        $xhprofData = \xhprof_disable();
        $xhprofRuns = new \XHProfRuns_Default();
        $runId = $xhprofRuns->save_run($xhprofData, "xhprof_testing");

        $uri = "/index.php?run={$runId}&source=xhprof_testing";

        if ($dumpUri) {
            echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
            echo "{$uri}\n";
            echo "<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n";
        }

        return $returnRunId ? $runId : $uri;
    }
}
