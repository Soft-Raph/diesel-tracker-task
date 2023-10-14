<?php

namespace App\Charts;




use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class DieselConsumptionChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->options([
            'responsive' => true,
            'maintainAspectRatio' => false,
        ]);

        $this->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $this->dataset('Diesel Consumption (Liters)', 'line', [4])->backgroundColor('rgba(75, 192, 192, 0.2)');
    }
}
