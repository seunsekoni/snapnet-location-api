<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\City;
use App\Models\Lga;
use App\Models\State;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * List all countries
     * @return \Illuminate\Http\Response
     */
    public function countries()
    {
        try 
        {
            $countries = Country::orderBy('name', 'ASC')->get();
    
            return $this->sendResponse($countries, 'Retrieved list of countries successfully.');
        } 
        catch (\Throwable $ex) 
        {
            \Log::error($ex);
            return $this->sendServerError('Failed to retrieve countries.');
        }

    }

    /**
     * Get a country details
     * @return \Illuminate\Http\Response
     * @param int $country_id
     */
    public function showCountry($id)
    {
        try 
        {
            $country = Country::find($id);
    
            return $this->sendResponse($country, 'Retrieved detail of country successfully.');
        } 
        catch (\Throwable $ex) 
        {
            \Log::error($ex);
            return $this->sendServerError('Failed to retrieve country details.');
        }

    }

    /**
     * List all states in a country
     * @return \Illuminate\Http\Response
     * @param int $country_id
     */
    public function stateInACountry($country_id)
    {
        try 
        {
            $states = State::where('country_id', $country_id)->orderBy('name', 'ASC')->get();
            return $this->sendResponse($states, "Successfully fetched states");
            
        } catch (\Throwable $th) 
        {
           \Log::error($th);
           return $this->sendServerError("Unable to fetch states");
        }
    }

    /**
     * Get a state detail
     * @return \Illuminate\Http\Response
     * @param int $country_id
     */
    public function showState($id)
    {
        try 
        {
            // Get a state with its Id
            $state = State::find($id);
            return $this->sendResponse($state, "Successfully retrieved state detail");
            
        } catch (\Throwable $th) 
        {
           \Log::error($th);
           return $this->sendServerError("Unable to fetch state detail");
        }
    }

    /**
     * List all cities in a state
     * @return \Illuminate\Http\Response
     * @param int $state_id
     */
    public function citiesInAState($state_id)
    {
        try {

            // find all cities related to the state
            $cities = City::where('state_id', $state_id)->orderBy('name', 'ASC')->get();
            return $this->sendResponse($cities, "Successfully fetched cities");
            
        } catch (\Throwable $th) {
           Log::error($th);
           $this->sendServerError("Unable to fetch cities");
        }

    }

    /**
     * Get a state detail
     * @return \Illuminate\Http\Response
     * @param int $country_id
     */
    public function showCity($id)
    {
        try 
        {
            // find city detail
            $city = City::find($id);
            return $this->sendResponse($city, "Successfully retrieved city detail");
            
        } catch (\Throwable $th) 
        {
           \Log::error($th);
           return $this->sendServerError("Unable to fetch city detail");
        }
    }

    /**
     * List all Lgas in a state
     * @return \Illuminate\Http\Response
     * @param int $country_id
     */
    public function LgaInAState($state_id)
    {
        try 
        {
            $lgas = Lga::where('state_id', $state_id)->get();
            return $this->sendResponse($lgas, "Successfully fetched Lgas");
            
        } catch (\Throwable $th) 
        {
           \Log::error($th);
           return $this->sendServerError("Unable to fetch Lgas");
        }
    }

    /**
     * Get an Lga detail
     * @return \Illuminate\Http\Response
     * @param int $country_id
     */
    public function ShowLga($id)
    {
        try 
        {
            $lga = Lga::find($id);
            return $this->sendResponse($lga, "Successfully retrieved lga detail");
            
        } catch (\Throwable $th) 
        {
           \Log::error($th);
           return $this->sendServerError("Unable to fetch lga detail");
        }
    }
    
}
