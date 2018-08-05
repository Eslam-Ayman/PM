<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\ProjectsFile;
use App\ProjectsImage;
use App\ProjectMessage;
use App\MessageImage;
use App\MessageFile;

class ProjectsController extends Controller
{
    public function submitMessage(Request $request, $id)
    {
        $this->validate($request, [
            'message' => 'required|string|max:255',
        ]);
        $projectMessage = new ProjectMessage();
        $projectMessage->message = $request->message;
        $projectMessage->user_id = auth()->user()->id;
        $projectMessage->project_id = $id;
        $projectMessage->save();

        $images = $request->image_name;
        if (!empty($images)) {
            foreach ($images as $image) {
                $path = $image->store('public/message_images');
                $fileToStore = $this->getUrl($path);
                $messageImage = new MessageImage();
                $messageImage->message_id = $projectMessage->id;
                $messageImage->image_path = $fileToStore;
                $messageImage->save();
            }
        }

        $files = $request->file_name;
        if (!empty($files)) {
            foreach ($files as $file) {
                $path = $file->store('public/message_files');
                $fileToStore = $this->getUrl($path);
                $messageFile = new MessageFile();
                $messageFile->file_id = $projectMessage->id;
                $messageFile->image_path = $fileToStore;
                $messageFile->save();
            }
        }
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        if (auth()->user()->type == 1) 
            $projects = $projects->filter(function($item) {
                    return $item->user_id == auth()->user()->id;
                });
        return view('admin.pages.projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $users = $users->filter(function($item) {
                    return $item->type != 0;
                });
        return view('admin.pages.projects.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'due_date' => 'required|date',
            'precentage' => 'required',
            'user_id' => 'required|string',
        ]);

        $project = new Project();
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->precentage = $request->input('precentage');
        $project->user_id = $request->user_id;
        $project->due_date = $request->input('due_date');
        $project->save();
        $images = $request->image_name;
        if (!empty($images)) {
            foreach ($images as $image) {
                $path = $image->store('public/project_images');
                $fileToStore = $this->getUrl($path);
                $projectImage = new ProjectsImage();
                $projectImage->project_id = $project->id;
                $projectImage->image_path = $fileToStore;
                $projectImage->save();
            }
        }
        else {
            $fileToStore = '/storage/project_images/noImage.jpg';
            $projectImage = new projectsImage();
            $projectImage->project_id = $project->id;
            $projectImage->image_path = $fileToStore;
            $projectImage->save();
        }


        $files = $request->file_name;
        if (!empty($files)) {
            foreach ($files as $file) {
                $path = $file->store('public/project_files');
                $fileToStore = $this->getUrl($path);
                $projectFile = new ProjectsFile();
                $projectFile->project_id = $project->id;
                $projectFile->image_path = $fileToStore;
                $projectFile->save();
            }
        }
        else {
            $fileToStore = '/storage/project_files/noImage.jpg';
            $projectFile = new projectsFile();
            $projectFile->project_id = $project->id;
            $projectFile->file_path = $fileToStore;
            $projectFile->save();
        }


        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        // dd($project);
        return view('admin.pages.projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $users = $users->filter(function($item) {
                    return $item->type != 0;
                });
        $project = Project::find($id);
        return view('admin.pages.projects.edit')->with(['users'=> $users, 'project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'due_date' => 'required|date',
            'precentage' => 'required',
            'user_id' => 'required|string',
        ]);

        $project = Project::find($id);
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->precentage = $request->input('precentage');
        $project->user_id = $request->user_id;
        $project->due_date = $request->input('due_date');
        $project->save();
        $images = $request->image_name;
        if (!empty($images)) {
            foreach ($images as $image) {
                $path = $image->store('public/project_images');
                $fileToStore = $this->getUrl($path);
                $projectImage = new ProjectsImage();
                $projectImage->project_id = $project->id;
                $projectImage->image_path = $fileToStore;
                $projectImage->save();
            }
        }
        /*else {
            $fileToStore = '/storage/project_images/noImage.jpg';
            $projectImage = new projectsImage();
            $projectImage->project_id = $project->id;
            $projectImage->image_path = $fileToStore;
            $projectImage->save();
        }*/


        $files = $request->file_name;
        if (!empty($files)) {
            foreach ($files as $file) {
                $path = $file->store('public/project_files');
                $fileToStore = $this->getUrl($path);
                $projectFile = new ProjectsFile();
                $projectFile->project_id = $project->id;
                $projectFile->image_path = $fileToStore;
                $projectFile->save();
            }
        }
        /*else {
            $fileToStore = '/storage/project_files/noImage.jpg';
            $projectFile = new projectsFile();
            $projectFile->project_id = $project->id;
            $projectFile->file_path = $fileToStore;
            $projectFile->save();
        }*/


        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        foreach ($project->images as $image) {
            if ($image->image_path != '/storage/project_images/noImage.jpg') {
                // $this->getUrl($post->image_name) is equal to /public/posts_images/dsadad.jpg
                \Storage::delete($this->getUrl($image->image_path));
            }
        }
        foreach ($project->files as $file) {
            if ($file->file_path != '/storage/project_files/noImage.jpg') {
                // $this->getUrl($post->image_name) is equal to /public/posts_images/dsadad.jpg
                \Storage::delete($this->getUrl($file->image_path));
            }
        }
        $project->delete();
        return redirect('/projects')->with('success' , 'project has deleted successfuly');
    }


    public function deleteImage($id)
    {
        $image = Project::find($id);
        if ($image->image_path != '/storage/posts_images/noImage.jpg') {
            // $this->getUrl($post->image_name) is equal to /public/posts_images/dsadad.jpg
            Storage::delete($this->getUrl($image->image_path));
        }
        $image->delete();
        return redirect('home')->with('success' , 'image has deleted successfuly');
    }
}
