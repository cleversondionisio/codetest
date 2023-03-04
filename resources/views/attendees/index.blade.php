<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
                <div class="p-6 bg-white border-b border-gray-200">
                    @unless(count($attendees) == 0)

                        <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-center font-bold">
                                    <td class="border px-6 py-4">Name</td>
                                    <td class="border px-6 py-4">Email</td>
                                    <td class="border px-6 py-4">Approved</td>
                                    <td class="border px-6 py-4">Member Since</td>
                                    <td class="border px-6 py-4">Action</td>
                                </tr>
                            </thead>
                            
                            @foreach($attendees as $attendee)
                                <tr>
                                    <td class="border px-6 py-4">{{$attendee->first_name . " " . $attendee->last_name}}</td>
                                    <td class="border px-6 py-4">{{$attendee->email}}</td>
                                    <td class="border px-6 py-4">{{$attendee->approved == 1 ? 'True' : 'False'}}</td>
                                    <td class="border px-6 py-4">{{$attendee->member_since}}</td>
                                    <td class="border px-6 py-4">
                                        <a href="/dashboard/attendees/edit/{{$attendee->id}}">
                                            <i class="fa-solid fa-pencil"></i> Edit
                                          </a>
                                    
                                          <form method="POST" action="/dashboard/attendees/delete/{{$attendee->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                                          </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>No Attendees found!</p>
                    @endunless
 
                    <div class="mt-6">
                        {{$attendees->links()}}
                    </div>
                   
                    <x-flash-message />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
