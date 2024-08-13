<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Report;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
     public function showLocationsForm()
     {
        $locations = Location::all();
        return view('admin.locations', ['locations' => $locations]);
     }

     public function storeLocation(Request $request)
     {
        $request->validate([
            'location' => 'required|string|max:255|unique:locations,name',
        ]);

        Location::create([ 
        'name' => $request->location,
         ]);

        return redirect()->route('admin.locations')->with('success', 'Location added successfully.');
     }

     public function deletelocation(Location $location) {
      $location->delete();
      return redirect()->route('admin.locations')
      ->with('success' , 'Location Deleted Successfully.');
     }


     public function showReports()
     {
      $reports = Report::select('post_id', 'reason')
      ->with('post.user')
      ->get()
      ->groupBy('post_id')
      ->map(function ($postReports) {
         $post = $postReports->first()->post;
         $user = $post->user;
         $totalReports = $postReports->count();
         $reasonsCount = $postReports->groupBy('reason')->map->count();

         return compact('post', 'user', 'totalReports', 'reasonsCount');
      });

      return view('admin.reports', ['reports' => $reports]);
      }

      public function ignoreReport(Post $post)
      {
         $post->reports()->delete();
         return redirect()->route('admin.reports')->with('success', 'All reports for the post have been ignored
         successfully.');
      }

      public function deletePost(Post $post)
      {
         $post->delete();
         return redirect()->route('admin.reports')->with('success', 'Post deleted successfully.');
     }
}
