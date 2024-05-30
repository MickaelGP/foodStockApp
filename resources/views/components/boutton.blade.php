
<div {{ $attributes->merge(['class' => 'text-center pb-3']) }}>
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn bg-black shadow  text-white']) }}>{{ $slot }}</button>
</div>
