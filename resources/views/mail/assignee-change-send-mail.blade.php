<h1>Hello {{$dulieu['old_assignee']}}</h1>
<p>This is a test mail sent from {{$dulieu['from']}}</p>
<p>{{$dulieu['task_name']}} task's assignee has been change from you to {{$dulieu['new_assignee']}}. Please be informed!</p>
@if (isset($dulieu['new_task_name']))
    <p>Task name change from <strong>{{$dulieu['task_name']}}</strong> to <strong>{{$dulieu['new_task_name']}}</strong></p>
@endif
@if (isset($dulieu['new_assignee']))
    <p>Task assignee change from <strong>{{$dulieu['old_assignee']}}</strong> to <strong>{{$dulieu['new_assignee']}}</strong></p>
@endif
@if (isset($dulieu['new_start_date']))
    <p>Task Start Date change from <strong>{{$dulieu['old_start_date']}}</strong> to <strong>{{$dulieu['new_start_date']}}</strong></p>
@endif
@if (isset($dulieu['new_end_date']))
    <p>Task End Date change from <strong>{{$dulieu['old_end_date']}}</strong> to <strong>{{$dulieu['new_end_date']}}</strong></p>
@endif
@if (isset($dulieu['new_cost']))
    <p>Task Cost change from <strong>{{$dulieu['old_cost']}}</strong> to <strong>{{$dulieu['new_cost']}}</strong></p>
@endif
@if (isset($dulieu['new_desc']))
    <p>Task Description change from <strong>{{$dulieu['old_desc']}}</strong> to <strong>{{$dulieu['new_desc']}}</strong></p>
@endif
@if (isset($dulieu['new_status']))
    <p>Task Status change from <strong>{{$dulieu['old_status']}}</strong> to <strong>{{$dulieu['new_status']}}</strong></p>
@endif