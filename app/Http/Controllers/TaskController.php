<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends ApiController

{

     //task tada fetch api
     public function index(Request $request)
     {
        //  $title = $request->query('title');
        //  $tasks = Task::where('title', 'like', "%$title%")->get();
        //      return response()->json($tasks);

           $tasks = Task::get();
            return $this->successResponse($tasks);

     }

      // Create data in task id New

    public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'due_date' => 'required|date',
                'status' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Create a new Task instance and save it to the database
            $task = new Task();
            $task->title = $request->title;
            $task->description = $request->description;
            $task->due_date = $request->due_date;
            $task->status = $request->status;
            $task->save();

            // Return a success response with the created task
            return $this->successResponse($task, 'Data Saved Successfully', 201);
        }


     // Show data in task id base

        public function show($id)
        {
                
            $task  = Task::find($id);

            return $this->successResponse($task);
            
            if (!$task) {
                return $this->successResponse('Task not found', 404);
            }
        }

        // Update data in task id base

        public function update(Request $request, Task $task)
        {
            // Validate the request data
            $validatedData = $request->validate([
                'title' => 'sometimes|string|max:255',
                'description' => 'sometimes|string',
                'due_date' => 'sometimes|date',
                'status' => 'sometimes|string',
            ]);
        
            // Update the task with validated data or keep the current value if not provided
            $task->title = $validatedData['title'] ?? $task->title;
            $task->description = $validatedData['description'] ?? $task->description;
            $task->due_date = $validatedData['due_date'] ?? $task->due_date;
            $task->status = $validatedData['status'] ?? $task->status;
        
            // Save the updated task to the database
            $task->save();
        
            if (!$task) {
                return $this->successResponse('Task not found', 404);
            }
        
            // Return a successful response with the updated task
            return $this->successResponse($task, 'Task updated successfully');
        }
        
            // Delete data in task id base

            public function destroy(Request $request, $id)
            {
                $task = Task::find($id);
            
                if (!$task) {
                    return $this->successResponse('Task not found', 404);
                }
            
                $task->delete();
            
                return $this->successResponse($id);
            }
   
}
?>