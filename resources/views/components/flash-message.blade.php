<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
  @if (session()->has('message'))
  <div class="p-3 text-green-700 bg-green-300 rounded">
      {{ session()->get('message') }}
  </div>
  @endif
</div>