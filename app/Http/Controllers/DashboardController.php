<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function getChartData()
    {
		// return Shipment::take(100)->get();
        $products = DB::table('products')
            ->select(DB::raw('count(id) as count, date_format(created_at, "%M") as date'))
            ->orderBy('id', 'asc')
            ->groupBy('date')
            // ->where('branch_id', Auth::user()->branch_id)
            ->get();
        $lables = [];
        $rows = [];
        foreach ($products as $key => $product) {
            $lables[] = $product->date;
            $rows[] = $product->count;
        }
        $data = array(
            'lables' => $lables,
            'rows' => $rows
        );
        return response()->json(['data' => $data]);
    }

    public function getChartOrders()
    {
		// return Shipment::take(100)->get();
        $orders = DB::table('orders')
            ->select(DB::raw('count(id) as count, date_format(created_at, "%M") as date'))
            ->orderBy('id', 'asc')
            ->groupBy('date')
            // ->where('status', 'Scheduled')
            ->get();

        $lables = [];
        $rows = [];
        foreach ($orders as $key => $order) {
            $lables[] = $order->date;
            $rows[] = $order->count;
        }
        $data = array(
            'lables' => $lables,
            'rows' => $rows
        );
        return response()->json(['data' => $data]);
    }

    public function getBrands()
    {
		// return Shipment::take(100)->get();
        $shipments = DB::table('brands')
            ->select(DB::raw('count(id) as count, date_format(created_at, "%M") as date'))
            ->orderBy('id', 'asc')
            ->groupBy('date')
            ->get();

        $lables = [];
        $rows = [];
        foreach ($shipments as $key => $shipment) {
            $lables[] = $shipment->date;
            $rows[] = $shipment->count;
        }
        $data = array(
            'lables' => $lables,
            'rows' => $rows
        );
        return response()->json(['data' => $data]);
    }

    public function getCategories()
    {
		// return Shipment::take(100)->get();
        $shipments = DB::table('categories')
            ->select(DB::raw('count(id) as count, date_format(created_at, "%M") as date'))
            ->orderBy('id', 'asc')
            ->groupBy('date')
            ->get();

        $lables = [];
        $rows = [];
        foreach ($shipments as $key => $shipment) {
            $lables[] = $shipment->date;
            $rows[] = $shipment->count;
        }
        $data = array(
            'lables' => $lables,
            'rows' => $rows
        );
        return response()->json(['data' => $data]);
    }

    public function getCountCount()
    {
        $countries = ['name' => 'Kenya', 'name' => 'Uganda', 'name' => 'Tanzania'];
        foreach ($countries as $country) {
            // return $country;
            // $tanzania = Shipment::where('country', 'Tanzania')->count();
            // $uganda = Shipment::where('country', 'Uganda')->count();
            // $kenya = Shipment::where('country', 'Kenya')->count();
        }
        return $country = array(
            'Kenya' => $kenya,
            'Tanzania' => $tanzania,
            'Uganda' => $uganda,
        );
    }


    public function getBranchCount()
    {
        $branches = Branch::setEagerLoads([])->get();
        $branch_count = [];
        foreach ($branches as $key => $branch) {
            // return $branch->id;
            // $branch_count[] = Shipment::where('branch_id', $branch->id)->count();
            $branch_count[] = array(
                'name' => $branch->branch_name,
                'id' => $key,
                // 'count' => Shipment::where('branch_id', $branch->id)->count(),
            );
        }
        return $branch_count;
    }

    public function getOrders()
    {
		// return Shipment::take(100)->get();
        $shipments = DB::table('orders')
            ->select(DB::raw('count(id) as count, date_format(created_at, "%M") as date'))
            ->orderBy('id', 'asc')
            ->groupBy('date')
            // ->where('branch_id', Auth::id())
            ->get();

        $lables = [];
        $rows = [];
        foreach ($shipments as $key => $shipment) {
            $lables[] = $shipment->date;
            $rows[] = $shipment->count;
        }
        $data = array(
            'lables' => $lables,
            'rows' => $rows
        );
        return response()->json(['data' => $data]);
    }

    public function getChartCount()
    {
		// return Shipment::take(100)->get();
        $shipments = DB::table('shipments')
            ->select(DB::raw('count(id) as count, date_format(created_at, "%M") as date'))
            ->orderBy('id', 'asc')
            ->groupBy('date')
            // ->where('branch_id', Auth::id())
            ->get();

        $lables = [];
        $rows = [];
        foreach ($shipments as $key => $shipment) {
            $lables[] = $shipment->date;
            $rows[] = $shipment->count;
        }
        $data = array(
            'lables' => $lables,
            'rows' => $rows
        );
        return response()->json(['data' => $data]);
    }

    public function getBranchShipments()
    {
        $branches = Branch::all();
        $A_branch = [];
        foreach ($branches as $branch) {
            $shipmen_ts = DB::table('shipments')
                ->select(DB::raw('count(id) as count, date_format(created_at, "%M") as date, branch_id'))
                ->orderBy('id', 'asc')
                ->groupBy('date')
                ->where('branch_id', $branch->id)
                ->get();
            
            // $shipments = Shipment::where('branch_id', $branch->id)->count();
            // json_decode(json_encode($branch), true);
            $A_branch[] = array_prepend(json_decode(json_encode($shipmen_ts), true), $branch->branch_name, 'name');
        }
        return $shipmen_ts;
    }


    public function getCountryhipments()
    {
        $countries = Country::setEagerLoads([])->get();
        $country_count = [];
        foreach ($countries as $key => $country) {
            // return $country->id;
            // $country_count[] = Shipment::where('country_id', $country->id)->count();
            $country_count[] = array(
                'name' => $country->country_name,
                'id' => $key,
                // 'count' => Shipment::where('country_id', $country->id)->count(),
            );
        }
        return $country_count;
    }

    public function getChartCountry()
    {
		// return Shipment::take(100)->get();
        $shipments = DB::table('shipments')
            ->select(DB::raw('count(id) as count, date_format(created_at, "%M") as date'))
            ->orderBy('id', 'asc')
            ->groupBy('date')
            // ->where('country_id', )
            ->get();

        $lables = [];
        $rows = [];
        foreach ($shipments as $key => $shipment) {
            $lables[] = $shipment->date;
            $rows[] = $shipment->count;
        }
        $data = array(
            'lables' => $lables,
            'rows' => $rows
        );
        return response()->json(['data' => $data]);
    }

    public function countDelivered()
    {
        // return Shipment::where('status', 'Delivered')->count();
    }

    public function countPending()
    {
        // return Shipment::count();
        // return Shipment::where('status', '!=', 'Delivered')->where('status', '!=', 'Cancelled')->count();
    }

    public function countOrders()
    {
        // return Shipment::count();
    }
}
