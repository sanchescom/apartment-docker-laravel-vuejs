<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Repositories\ApartmentsRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ApartmentController extends Controller
{
    public function getAllApartments()
    {
        return response()->json(ApartmentsRepository::getAll()->getResponseData(), Response::HTTP_OK);
    }


    public function addApartment(Request $request)
    {
        $this->validateApartment($request);

        try
        {
            $apartment = Apartment::create($request->all());
        }
        catch (\Exception $exception)
        {
            throw new HttpException(Response::HTTP_INTERNAL_SERVER_ERROR, 'Creating apartment error', $exception);
        }

        return response()->json($apartment->toArray(), Response::HTTP_OK);
    }


    public function updateApartment(Request $request, $id)
    {
        $apartment = Apartment::findOrFail($id);

        $this->checkPermission($request, $apartment);
        $this->validateApartment($request);

        try
        {
            $apartment->fill($request->all());
            $apartment->save();
        }
        catch (\Exception $exception)
        {
            throw new HttpException(Response::HTTP_INTERNAL_SERVER_ERROR, 'Updating apartment error', $exception);
        }

        return response()->json($apartment->toArray(), Response::HTTP_OK);
    }


    public function getApartment($id)
    {
        return response()->json(Apartment::findOrFail($id)->toArray(), Response::HTTP_OK);
    }


    private function validateApartment(Request $request)
    {
        $this->validate($request, [
            'move_in_date' => 'required',
            'street'       => 'required|string',
            'post_code'    => 'required|string',
            'city'         => 'required|string',
            'country'      => 'required|string',
            'email'        => 'required|string|max:15|email',
        ]);
    }


    private function checkPermission(Request $request, Apartment $apartment)
    {
        if ($request->get('token') != $apartment->token)
        {
            throw new AccessDeniedHttpException('Access denied!');
        }
    }
}