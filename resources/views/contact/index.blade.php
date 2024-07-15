@include('layout.header')

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Contacts</h1>

    <div class="overflow-x-auto">
        <table class="table-auto min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Message</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($contact as $contact)
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2 text-center">{{ $contact->name }}</td>
                    <td class="px-4 py-2 text-center">{{ $contact->email }}</td>
                    <td class="px-4 py-2 text-center">{{ $contact->message }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>