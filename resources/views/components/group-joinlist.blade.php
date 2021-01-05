 @if ($outs == 'hello')
                    {{__('')}}
                @else
                    <h4 class="bg-white py-1 px-3 rounded d-inline-block text-secondary">
                        @if ($looks == 'hello')
                            {{__('')}}
                        @else
                            {{$looks->gname}} Group Todo-list <i style="color:#bbb; font-size:8px; font-weight:bolder">Joined</i>
                        @endif
                        
                    </h4>
                    <table class="table table-hover table-responsive-xl" style="color: rgb(82, 80, 80)">
                        <thead>
                            <tr>
                                <th>Task name</th>
                                <th>Statue</th>
                                <th>Priority</th>
                                <th>Due date</th>
                                <th>Task type</th>
                                <th>Assignee</th>
                                <th>Hours budgeted</th>
                                 @if ($takes == 'hello')
                                    {{__('')}}
                                @else
                                    @if ($takes === Auth::user()->name)
                                        <th>Update</th>
                                    @endif
                                @endif
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                                @forelse ($outs as $out)
                                    <tr>
                                        <td>{{$out->tname}}</td>
                                        <td>{{$out->status}}</td>
                                        <td class="@if ($out->priority === 'HIGH') bg-danger @endif @if ($out->priority === 'MEDIUM') bg-warning @endif @if ($out->priority === 'LOW') bg-primary @endif">
                                            {{$out->priority}}
                                        </td>
                                        <td>{{$out->ddate}}</td>
                                        <td>{{$out->ttype}}</td>
                                        <td>
                                            @foreach ($out->tags as $tag)
                                                {{$tag->name}}
                                            @endforeach
                                        </td>
                                        <td>{{$out->hour}}</td>
                                        @if ($takes == $tag->name)
                                            <td>
                                                <a href="{{ route('grouptodo.edit2-0', $out->id)}}" class="text-decoration-none text-info">
                                                    Edit
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    {{__('')}}
                                @endforelse
                            
                            
                        </tbody>
                    </table>
                @endif