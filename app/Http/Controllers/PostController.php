<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
          $validatedData = $request->validated();

          
          $file = $request->file('pet_image');
          $filename = time() . '.' . $file->getClientOriginalExtension();
          $path = $file->storeAs('pet_images', $filename, 'public');

          $validatedData['pet_image'] = $path;

        auth()->user()->posts()->create($validatedData);

        return redirect()->route('pets.index')
        ->with('success', 'Pet posted successfully.')
       ;  
         
    }

    

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit' ,['pet' => $post->load('location')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
         // Check if a new image file is uploaded
         if ($request->hasFile('pet_image')) {
         // Delete the old image if it exists
         if ($post->pet_image) {
         Storage::disk('public')->delete($post->pet_image);
         }

         // Store the new image
         $file = $request->file('pet_image');
         $filename = time() . '.' . $file->getClientOriginalExtension();
         $path = $file->storeAs('pet_images', $filename, 'public');

         // Update the post with the new image path
         $post->update([
         'pet_image' => $path,
         ]);
         }

         // Update other post details
         $post->update([
         'name' => $request->name,
         'animal_type' => $request->animal_type,
         'age' => $request->age,
         'description' => $request->description,
         'gender' => $request->gender,
         'color' => $request->color,
         'breed' => $request->breed,
         'size' => $request->size,
         'location_id' => $request->location_id,
         ]);

    
        return redirect()->route('my_post.index')
        ->with('success', 'post updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('my_post.index')
            ->with('success', 'post deleted.');
    }
}
