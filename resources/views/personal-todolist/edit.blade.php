<x-master>
<div>
    <script>
        $(document).ready(function() {

            $('#my').modal('show');
            $('#my').modal({ backdrop: 'static' , keyboard: false });
            
        });
    </script>

    <!-- modal-->
    <div class="modal fade" id="my"  data-backdrop='static'  keyboard='false' tabindex="-1" role="dialog">
       <div class="modal-dialog">
           <!-- model content -->
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-titel">
                       Personal Todo-list
                   </h4>                   
               </div>
               <form method="POST" action="{{ route('update.personal', $id->id)}}">
                   @csrf
                   @method('PUT')
                   <div class="modal-body">
                       <div class="form-group">
                           <label for="pname">
                               Task name
                           </label>
                           <input type="text" name="pname" value="{{$id->pname}}"
                                  class="form-control @error('pname') is-invalid @enderror">
                           @error('pname')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>

                       <div class="form-group">
                           <label for="pstatus">
                               Status
                           </label>
                           <select name="pstatus"  class="form-control @error('pstatus') is-invalid @enderror">
                               <option @if ($id->pstatus == '🏃 IN progress') selected @endif
                               value="🏃 IN progress">🏃 In progress</option>

                               <option @if ($id->pstatus == '⚠ Not started') selected @endif
                               value="⚠ Not started">⚠ not started</option>

                               <option @if ($id->pstatus == '✔ Completed') selected @endif
                               value="✔ Completed">✔ Completed</option>

                               <option @if ($id->pstatus == '✖ On hold') selected @endif
                               value="✖ On hold">✖ on hold</option>
                           </select>
                           @error('pstatus')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>

                       <div class="form-group">
                           <label for="prioritys">
                               Priority
                           </label>
                           <select name="prioritys"  class="form-control @error('prioritys') is-invalid @enderror">
                               <option @if ($id->prioritys == 'LOW') selected @endif
                               value="LOW">low</option>

                               <option @if ($id->prioritys == 'MEDIUM') selected @endif 
                               value="MEDIUM">medium</option>

                               <option @if ($id->prioritys == 'HIGH') selected @endif
                               value="HIGH">high</option>
                           </select>
                           @error('prioritys')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>

                       <div class="form-group">
                           <label for="date">
                               Due date
                           </label>
                           <input type="date" name="date" value="{{ $id->date}}"
                                class="form-control @error('date') is-invalid @enderror">
                           @error('date')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>

                       <div class="form-group">
                           <label for="type">
                               Task type
                           </label>
                           <input type="text" name="type" value="{{ $id->type}}"
                           class="form-control @error('type') is-invalid @enderror">
                           @error('type')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>

                       <div class="form-group">
                           <label for="phour">
                               Hours budgeted
                           </label>
                           <input type="text" name="phour" value="{{ $id->phour}}"
                             class="form-control @error('phour') is-invalid @enderror">
                            @error('phour')
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