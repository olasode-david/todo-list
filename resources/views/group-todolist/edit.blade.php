<x-master>
                        <!-- Group todo-list edit son! -->
    <div>
        <script>
            $(document).ready(function() {
    
                $('#myTodo').modal('show');
                $('#myTodo').modal({ backdrop: 'static' , keyboard: false });
                
            });
        </script>
    
        <!-- modal-->
        <div class="modal fade" id="myTodo"  data-backdrop='static'  keyboard='false' tabindex="-1" role="dialog">
           <div class="modal-dialog">
               <!-- model content -->
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-titel">
                           Group Todo-list <span style="font-size:12px" class="text-info">Edit</span>
                       </h5>                       
                   </div>
                   <form method="POST" action="{{ route('grouptodo.update', $groupTodo->id)}}">
                       @csrf
                       @method('PUT')
                       <div class="modal-body">
                           <div class="form-group">
                               <label for="tname">
                                   Task name
                               </label>
                               <input type="text" name="tname" value="{{$groupTodo->tname}}"
                                      class="form-control @error('tname') is-invalid @enderror">
                               @error('tname')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
    
                           <div class="form-group">
                               <label for="status">
                                   Status
                               </label>
                               <select name="status"  class="form-control @error('status') is-invalid @enderror">
                                    <option @if ($groupTodo->status == '🏃 IN progress') selected @endif
                                        value="🏃 IN progress">🏃 In progress
                                    </option>
                                    <option  @if ($groupTodo->status == '⚠ Not started') selected @endif
                                        value="⚠ Not started">⚠ not started
                                    </option>
                                    <option @if ($groupTodo->status == '✔ Completed') selected @endif
                                        value="✔ Completed">✔ Completed
                                    </option>
                                    <option @if ($groupTodo->status == '✖ On hold') selected @endif
                                        value="✖ On hold">✖ on hold
                                    </option>
                               </select>
                               @error('status')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
    
                           <div class="form-group">
                               <label for="priority">
                                   Priority
                               </label>
                               <select name="priority"  class="form-control @error('priority') is-invalid @enderror">
                                    <option @if ($groupTodo->priority == 'LOW') selected @endif
                                        value="LOW">low
                                    </option>
                                    <option @if ($groupTodo->priority == 'MEDIUM') selected @endif
                                        value="MEDIUM">medium
                                    </option>
                                    <option @if ($groupTodo->priority == 'HIGH') selected @endif
                                        value="HIGH">high\
                                    </option>
                               </select>
                               @error('priority')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
    
                           <div class="form-group">
                               <label for="ddate">
                                   Due date
                               </label>
                               <input type="date" name="ddate" value="{{$groupTodo->ddate}}"
                                    class="form-control @error('ddate') is-invalid @enderror">
                               @error('ddate')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
    
                           <div class="form-group">
                               <label for="ttype">
                                   Task type
                               </label>
                               <input type="text" name="ttype" value="{{$groupTodo->ttype}}"
                               class="form-control @error('ttype') is-invalid @enderror">
                               @error('ttype')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
    
                           <div class="form-group">
                               <label for="hour">
                                   Hours budgeted
                               </label>
                               <input type="text" name="hour" value="{{$groupTodo->hour}}"
                                 class="form-control @error('hour') is-invalid @enderror">
                                @error('hour')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
    
                       </div>
    
                       <div class="modal-footer">
                           <button type="submit" class="btn btn-info">
                               Submit
                           </button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
    
    </div>
       {{-- @if ($errors->has('tname') || $errors->has('status') || $errors->has('priority') || $errors->has('ddate') || $errors->has('ttype') || $errors->has('hour') || $errors->has('ahour'))
          
       @endif --}}
      
       
       
    </x-master>