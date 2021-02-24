<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/23/21
 * Time: 11:30 PM
 */

namespace App\Exports\Quotes;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Excel;

class QuoteExport implements FromView, Responsable
{
    use Exportable;
    
    protected $meters;
    
    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'quote.xls';
    
    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLS;
    
    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];
    
    public function __construct($meters)
    {
        $this->meters = $meters;
    }
    
    public function view(): View
    {
        return view('backend.meters.electricity.download',[
            'meters' => $this->meters,
        ]);
    }
}
{
    
}