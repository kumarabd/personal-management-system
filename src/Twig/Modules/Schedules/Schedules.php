<?php

namespace App\Twig\Modules\Schedules;

use App\Controller\Core\Application;
use App\Entity\Modules\Schedules\MyScheduleType;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Schedules extends AbstractExtension {

    /**
     * @var Application $app
     */
    private $app;

    public function __construct(Application $app) {
        $this->app = $app;
    }

    public function getFunctions() {
        return [
            new TwigFunction('getSchedulesTypes', [$this, 'getSchedulesTypes']),
        ];
    }

    /**
     * @return MyScheduleType[]
     */
    public function getSchedulesTypes():array {
        return $this->app->repositories->myScheduleTypeRepository->getAllTypes();
    }

}