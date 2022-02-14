<button {{ 
$attributes->merge(['type' => 'submit', 'class' => 'bg-white hover:bg-gray-400 focus:border-gray-400 focus:ring-gray-400 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring  disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
