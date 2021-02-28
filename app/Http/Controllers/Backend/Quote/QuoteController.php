<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 2/17/21
 * Time: 11:47 PM
 */

namespace App\Http\Controllers\Backend\Quote;

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
            ->withInventories($inventoryRepository->getInventories()->get());
    }
    
    /**
     * @param StoreQuoteRequest $request
     * @param QuoteRepository $quoteRepository
     * @return mixed
     * @throws \Throwable
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
     * @throws \Throwable
     */
    public function update(UpdateQuoteRequest $request, Quote $quote, QuoteRepository $quoteRepository)
    {
        $quoteRepository->update($quote, $request->input());
        
        return redirect()->route('admin.quotes.quote.index')
            ->withFlashSuccess(__('alerts.backend.quote.quote.updated'));
    }
    
    /**
     * @param Quote $quote
     * @param InventoryRepository $inventoryRepository
     * @return mixed
     */
    public function edit(Quote $quote, InventoryRepository $inventoryRepository)
    {
        return view('backend.quotes.quote.edit')
            ->withInventories($inventoryRepository->getInventories()->get())
        ->withQuote($quote);
    }
    
    /**
     * @param Quote $quote
     * @return mixed
     */
    public function download(Quote $quote)
    {
        $pdf = \PDF::loadView('backend.quotes.quote.pdf', ['quote' => $quote]);
        
        return $pdf->download('quote.pdf');
    }
    
}