@component('mail::message')
# Introduction

Hi, {{$data['friend_name']}},{{$data['your_name']}}({{$data['your_email']}}) has reffered you this job.

@component('mail::button', ['url' => $data['jobUrl']])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
