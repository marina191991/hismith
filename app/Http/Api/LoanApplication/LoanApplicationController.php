<?php

namespace App\Http\Api\LoanApplication;

use App\Core\Bank\Models\Bank;
use App\Core\Dealer\Models\DealerEmployee;
use App\Core\LoanApplication\DataTransferObjects\LoanApplicationDTO;
use App\Core\LoanApplication\DataTransferObjects\LoanApplicationUpdateDTO;
use App\Core\LoanApplication\LoanApplicationService;
use App\Core\LoanApplication\Models\LoanApplication;
use App\Http\Api\LoanApplication\Requests\LoanApplicationIndexRequest;
use App\Http\Api\LoanApplication\Requests\LoanApplicationStoreRequest;
use App\Http\Api\LoanApplication\Requests\LoanApplicationUpdateRequest;
use App\Http\Api\LoanApplication\Responses\LoadApplicationStoreResponse;
use App\Http\Api\LoanApplication\Responses\LoanApplicationDeleteResponse;
use App\Http\Api\LoanApplication\Responses\LoanApplicationIndexResponse;
use App\Http\Api\LoanApplication\Responses\LoanApplicationShowResponse;
use App\Http\Api\LoanApplication\Responses\LoanApplicationUpdateResponse;
use App\Http\Api\ResponseData\PaginationData;
use App\Http\BaseController;

class LoanApplicationController extends BaseController
{
    public function __construct(protected LoanApplicationService $service)
    {
    }

    public function index(LoanApplicationIndexRequest $request): LoanApplicationIndexResponse
    {
        $limit = $request->limit ?? 0;
        $offset = $request->offset ?? 0;

        $queryBuilder = LoanApplication::query()
            ->orderByDesc('created_at');

        if ($limit) {
            $queryBuilder->limit($limit);
        }

        $total = $queryBuilder->count();

        if ($offset) {
            $queryBuilder->offset($offset);
        }

        $loanApplications = $queryBuilder->get();

        return new LoanApplicationIndexResponse(
            resourceCollection: LoanApplicationJsonResource::collection($loanApplications),
            paginationData: new PaginationData(
                limit: $limit,
                offset: $offset,
                total: $total
            )
        );
    }

    public function show(LoanApplication $loanApplication): LoanApplicationShowResponse
    {
        return new LoanApplicationShowResponse(LoanApplicationJsonResource::make($loanApplication));
    }

    public function store(LoanApplicationStoreRequest $request): LoadApplicationStoreResponse
    {
        $model = $this->service->create(
            new LoanApplicationDTO(
                dealerEmployee: DealerEmployee::query()
                    ->find($request->dealer_employee_id)->first(),
                bank: Bank::query()
                    ->find($request->bank_id)->first(),
                amount: $request->amount,
                term: $request->term,
                interestRate: $request->interest_rate,
                reasonDescription: $request->reason_description
            )
        );

        return new LoadApplicationStoreResponse(LoanApplicationJsonResource::make($model));
    }

    public function update(
        LoanApplicationUpdateRequest $request,
        LoanApplication $loanApplication
    ): LoanApplicationUpdateResponse {
        $updateModel = $this->service->update(
            new LoanApplicationUpdateDTO(
                dealerEmployee: DealerEmployee::query()->find($request->dealer_employee_id),
                bank: Bank::query()->find($request->bank_id),
                amount: $request->amount,
                term: $request->term,
                interestRate: $request->interest_rate,
                reasonDescription: $request->reason_description,
                status: $request->status
            ),
            $loanApplication
        );

        return new LoanApplicationUpdateResponse(LoanApplicationJsonResource::make($updateModel));
    }

    public function destroy(LoanApplication $loanApplication): LoanApplicationDeleteResponse
    {
        $this->service->delete($loanApplication);

        return new LoanApplicationDeleteResponse('Loan application deleted successfully');
    }


}
