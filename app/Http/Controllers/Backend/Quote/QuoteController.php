<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/17/21
 * Time: 11:47 PM
 */

namespace App\Http\Controllers\Backend\Quote;


use App\Exports\Quotes\QuoteExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Quote\StoreQuoteRequest;
use App\Http\Requests\Backend\Quote\UpdateQuoteRequest;
use App\Models\Quote\Quote;
use App\Repositories\Backend\Quote\InventoryRepository;
use App\Repositories\Backend\Quote\QuoteRepository;

class QuoteController extends Controller
{
    /**
     * @param QuoteRepository $quoteRepository
     * @return mixed
     */
    public function index(QuoteRepository $quoteRepository)
    {
        return view('backend.quotes.quote.index')
            ->withQuotes($quoteRepository->getQuotes()->paginate());
    }
    
    public function create(InventoryRepository $inventoryRepository)
    {
        return view('backend.quotes.quote.create')
            ->withInventories($inventoryRepository->getInventories());
    }
    
    /**
     * @param StoreQuoteRequest $request
     * @param QuoteRepository $quoteRepository
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function store(StoreQuoteRequest $request, QuoteRepository $quoteRepository)
    {
        $quoteRepository->create($request->input());
        
        return redirect()->route('admin.quotes.quote.index')
            ->withFlashSuccess(__('alerts.backend.quote.quote.created'));
    }
    
    /**
     * @param UpdateQuoteRequest $request
     * @param Quote $quote
     * @param QuoteRepository $quoteRepository
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(UpdateQuoteRequest $request, Quote $quote, QuoteRepository $quoteRepository)
    {
        $quoteRepository->update($quote, $request->input());
        
        return redirect()->route('admin.quotes.quote.index')
            ->withFlashSuccess(__('alerts.backend.administration.currency.updated'));
    }
    
    /**
     * @param Quote $quote
     * @return mixed
     */
    public function edit(Quote $quote)
    {
        return view('backend.quotes.quote.edit')
            ->withQuote($quote);
    }
    
    
    /**
     * @param Quote $quote
     * @return QuoteExport
     */
    public function download(Quote $quote)
    {
        return (new QuoteExport($quote));
    }
    
}