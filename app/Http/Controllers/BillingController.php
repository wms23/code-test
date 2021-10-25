<?php

namespace App\Http\Controllers;

use App\DataTables\BillingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBillingRequest;
use App\Http\Requests\UpdateBillingRequest;
use App\Models\Client;
use App\Repositories\BillingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BillingController extends AppBaseController
{
    /** @var  BillingRepository */
    private $billingRepository;

    public function __construct(BillingRepository $billingRepo)
    {
        $this->billingRepository = $billingRepo;
    }

    /**
     * Display a listing of the Billing.
     *
     * @param BillingDataTable $billingDataTable
     * @return Response
     */
    public function index(BillingDataTable $billingDataTable)
    {
        return $billingDataTable->render('billings.index');
    }

    /**
     * Show the form for creating a new Billing.
     *
     * @return Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('billings.create')->with('clients', $clients);
    }

    /**
     * Store a newly created Billing in storage.
     *
     * @param CreateBillingRequest $request
     *
     * @return Response
     */
    public function store(CreateBillingRequest $request)
    {
        $input = $request->all();

        $billing = $this->billingRepository->create($input);

        Flash::success('Billing saved successfully.');

        return redirect(route('billings.index'));
    }

    /**
     * Display the specified Billing.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $billing = $this->billingRepository->find($id);

        if (empty($billing)) {
            Flash::error('Billing not found');

            return redirect(route('billings.index'));
        }

        return view('billings.show')->with('billing', $billing);
    }

    /**
     * Show the form for editing the specified Billing.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $billing = $this->billingRepository->find($id);

        if (empty($billing)) {
            Flash::error('Billing not found');

            return redirect(route('billings.index'));
        }

        $clients = Client::all();

        return view('billings.edit',compact('billing', 'clients'));
    }

    /**
     * Update the specified Billing in storage.
     *
     * @param  int              $id
     * @param UpdateBillingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBillingRequest $request)
    {
        $billing = $this->billingRepository->find($id);

        if (empty($billing)) {
            Flash::error('Billing not found');

            return redirect(route('billings.index'));
        }

        $billing = $this->billingRepository->update($request->all(), $id);

        Flash::success('Billing updated successfully.');

        return redirect(route('billings.index'));
    }

    /**
     * Remove the specified Billing from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $billing = $this->billingRepository->find($id);

        if (empty($billing)) {
            Flash::error('Billing not found');

            return redirect(route('billings.index'));
        }

        $this->billingRepository->delete($id);

        Flash::success('Billing deleted successfully.');

        return redirect(route('billings.index'));
    }
}
