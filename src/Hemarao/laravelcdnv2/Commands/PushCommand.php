<?php

namespace Hemarao\Laravelcdn\Hemarao\laravelcdnv2\Commands;

use Illuminate\Console\Command;
use Hemarao\Laravelcdn\Hemarao\laravelcdnv2\Cdn;
use Hemarao\Laravelcdn\Hemarao\laravelcdnv2\Contracts\CdnInterface;

/**
 * Class PushCommand.
 *
 * @category Command
 *
 * @author   Hemarao <hemsbapu9644@gmail.com>
 */
class PushCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'cdn:push';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Push assets to CDN';

    /**
     * an instance of the main Cdn class.
     *
     * @var Cdn
     */
    protected $cdn;

    /**
     * @param CdnInterface $cdn
     */
    public function __construct(CdnInterface $cdn)
    {
        $this->cdn = $cdn;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->cdn->push();
    }
}
