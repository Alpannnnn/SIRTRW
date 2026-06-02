<div class="overflow-x-auto w-full border-t border-slate-100">
    <table {{ $attributes->merge(['class' => 'min-w-full divide-y divide-slate-200 text-sm text-left text-slate-700']) }}>
        {{ $slot }}
    </table>
</div>
