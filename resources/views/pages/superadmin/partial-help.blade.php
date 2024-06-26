
@if(count($help))
    @foreach($help as $hp)
            <div class="help-card">
                <div class="help-card-profile">
                    <h1><img src="{{asset('assets/images/user.png')}}" alt="" />{{$hp['first_name'] ?? ''}} {{$hp['last_name'] ?? ''}}</h1>
                    <h1><img src="{{asset('assets/images/mail.png')}}" alt="" />{{$hp['email'] ?? ''}}</h1>
                    <h1 class="message-detail"><img src="{{asset('assets/images/email.png')}}" alt="" /><span>{{$hp['message'] ?? ''}}</span></h1>
                   @if(!empty($hp['reply']))
                    <h1 class="message-reply"><span>{{$hp['reply'] ?? ''}}</span></h1>
                    @endif
                </div>
                <div class="help-card-action">
                @if(empty($hp['reply']))
                    <a title="Reply" href="{{url('/help-detail', ['id' => $hp['id']])}}" class="reply-btn btn"><img src="{{asset('assets/images/reply.png')}}" alt="" /></a>
                    @endif
                    <a href="{{url('/help-detail', ['id' => $hp['id']])}}"><img src="{{asset('assets/images/view-icon.png')}}" alt="" /></a>

                </div>
            </div>
             {{-- <div class="help-card">
                <div class="help-card-profile">
                    <h1><img src="{{asset('assets/images/user.png')}}" alt="" />{{$hp['first_name'] ?? ''}} {{$hp['last_name'] ?? ''}}</h1>
                    <h1><img src="{{asset('assets/images/mail.png')}}" alt="" />{{$hp['email'] ?? ''}}</h1>
                    <h1 class="message-detail"><img src="{{asset('assets/images/email.png')}}" alt="" /><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni incidunt porro dolore, dicta vel perspiciatis eos quisquam a quos quod, iusto itaque hic culpa soluta esse! Voluptates unde nemo velit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni incidunt porro dolore, dicta vel perspiciatis eos quisquam a quos quod, iusto itaque hic culpa soluta esse! Voluptates unde nemo velit.</span></h1>

                    <h1 class="message-reply d-none"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span></h1>
                </div>
                <div class="help-card-action">
                    <a href="{{url('/help-detail', ['id' => $hp['id']])}}" class="reply-btn btn"><img src="{{asset('assets/images/reply.png')}}" alt="" /></a>
                    <a href="{{url('/help-detail', ['id' => $hp['id']])}}"><img src="{{asset('assets/images/view-icon.png')}}" alt="" /></a>

                </div>
            </div>  --}}

    @endforeach
    @else
    <div class="company-card no-record">
        <h1>No Record Found!</h1>
    </div>
    @endif


<div class="container pagination-wrapper py-4">
    <div id="pagination-links" class="pagination">
        {{ $help->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
