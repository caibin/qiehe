<ul class="list-unstyled">
    @foreach ($replies as $index => $reply)
        <li class="media"  name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
            <a href="{{ route('users.show', [$reply->user_id]) }}">
                <img class="mr-3 img-thumbnail" alt="{{ $reply->user->name }}" src="{{ $reply->user->avatar }}"  style="width:48px;height:48px;"/>
            </a>

            <div class="media-body">
                <h5 class="mt-0">
                    <a href="{{ route('users.show', [$reply->user_id]) }}" title="{{ $reply->user->name }}">
                        {{ $reply->user->name }}
                    </a>
                    <span> •  </span>
                    <span class="meta" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>

                    {{-- 回复删除按钮 --}}
                    @can('destroy',$reply)
                    <span class="meta float-right footer-grap">
                        <form action="{{ route('replies.destroy', $reply->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-default btn-xs pull-left">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </span>
                        @endcan
                 </h5>
                <p>
                    {!! $reply->body !!}
                </p>
            </div>
        </li>
        <hr>
    @endforeach
</ul>