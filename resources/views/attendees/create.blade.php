<x-app-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Add New Attendees</h2>
    </header>

    <form method="POST" action="/dashboard/attendees">
      @csrf
      <div class="mb-6">
        <label for="first_name" class="inline-block text-lg mb-2">First Name</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="first_name"
          value="{{old('first_name')}}" />

        @error('first_name')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="last_name" class="inline-block text-lg mb-2">Last Name</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="last_name"
           value="{{old('last_name')}}" />
           

        @error('last_name')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="approved" class="inline-block text-lg mb-2">Approve</label>

          <select class="border border-gray-200 rounded p-2 w-full" name="approved"
          placeholder="Example: Remote, Boston MA, etc" value="{{old('approved')}}">
            <option value=1>True</option>
            <option value=0>False</option>
            
          </select>

        @error('approved')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">
          Email
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button class="bg-black text-white rounded py-2 px-4">
          Submit
        </button>

        <a href="/dashboard/attendees" class="text-black ml-4"> Back </a>
      </div>
    </form>
  </x-card>
</x-app-layout>
