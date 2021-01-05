<x-master>
    <div>
        <script>
            $(document).ready(function() {
    
                $('#groupname').modal('show');
                $('#groupname').modal({ backdrop: 'static' , keyboard: false });
                
            });
        </script>
    
        <!-- modal-->
        <div class="modal fade" id="groupname"  data-backdrop='static'  keyboard='false' tabindex="-1" role="dialog">
           <div class="modal-dialog">
               <!-- model content -->
               <div class="modal-content">
                   <div class="modal-header">
                       <h4 class="modal-titel">
                           Personal Todo-list
                       </h4>                       
                   </div>
                   <form method="POST" action="{{ route('group.store')}}">
                       @csrf
                       <div class="modal-body">
                        
                            <div class="form-group">
                               <label for="gname">
                                   Group name
                               </label>
                               <input type="text" name="gname"
                                      class="form-control @error('gname') is-invalid @enderror">
                               @error('gname')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                            </div>                     
                          
                       </div>
    
                       <div class="modal-footer">
                           <button type="submit" class="btn btn-primary">
                               Submit
                           </button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
    
    </div>

</x-master>