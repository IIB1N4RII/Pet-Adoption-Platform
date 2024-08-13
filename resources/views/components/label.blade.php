<label for="{{$for}}" 
{{$attributes->class(['block text-sm font-medium text-slate-900'])}}>
{{$slot}}

@if ($required)
    <span> *</span>
@endif
</label>