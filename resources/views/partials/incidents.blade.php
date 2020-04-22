<h4>{{ formatted_date($date) }}</h4>
<div class="timeline">
    <div class="content-wrapper">
        @forelse($incidents as $incident)
        <div class="moment {{ $loop->first ? 'first' : null }}">
            <div class="row event clearfix">
                <div class="col-sm-1">
                    <div class="status-icon status-{{ $incident->latest_human_status }}">
                        <i class="{{ $incident->latest_icon }}"></i>
                    </div>
                </div>
                <div class="col-xs-10 col-xs-offset-2 col-sm-11 col-sm-offset-0">
                    <div class="panel panel-message incident">
                        <div class="panel-heading">
                            @if($incident->component)
                            <span class="label label-default">{{ $incident->component->name }}</span>
                            @endif
                            <strong>{{ $incident->name }}</strong>{{ $incident->isScheduled ? trans("cachet.incidents.scheduled_at", ["timestamp" => $incident->scheduled_at_diff]) : null }}
                            <br>
                            <small class="date">
                                <abbr class="timeago" data-timeago="{{ $incident->timestamp_iso }}"></abbr>
                            </small>
                        </div>
                        <div class="panel-body markdown-body">
                            {!! $incident->formatted_message !!}
                        </div>
                        @if($incident->updates->isNotEmpty())
                        <div class="list-group">
                            @foreach($incident->updates as $update)
                            <li class="list-group-item incident-update-item">
                                
                                <i class="{{ $update->icon }}"></i>
                                {!! $update->formatted_message !!}
                                <small>
                                    <abbr class="timeago" data-timeago="{{ $update->timestamp_iso }}">
                                    </abbr>
                                </small>
                            </li>
                            @endforeach
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        @empty
        <div class="panel panel-message incident">
            <div class="panel-body">
                <p>{{ trans('cachet.incidents.none') }}</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
