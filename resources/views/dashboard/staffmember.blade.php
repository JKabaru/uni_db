<div class="mt-8 bg-white rounded">
    <div class="w-full max-w-2xl px-6 py-12">

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Name : 
                </label>
            </div>
            <div class="md:w-2/3">
                <span class="block text-gray-600 font-bold">{{ $staffmember->user->name }}</span>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Email :
                </label>
            </div>
            <div class="md:w-2/3">
                <span class="text-gray-600 font-bold">{{ $staffmember->user->email }}</span>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Department :
                </label>
            </div>
            <div class="md:w-2/3">
                <span class="text-gray-600 font-bold">{{ $staffmember->department->department_name }}</span>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Phone :
                </label>
            </div>
            <div class="md:w-2/3">
                <span class="text-gray-600 font-bold">{{ $staffmember->phone }}</span>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Gender :
                </label>
            </div>
            <div class="md:w-2/3">
                <span class="text-gray-600 font-bold">{{ $staffmember->gender }}</span>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Date of Birth :
                </label>
            </div>
            <div class="md:w-2/3">
                <span class="text-gray-600 font-bold">{{ $staffmember->dateofbirth }}</span>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Current Address :
                </label>
            </div>
            <div class="md:w-2/3">
                <span class="text-gray-600 font-bold">{{ $staffmember->current_address }}</span>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Permanent Address :
                </label>
            </div>
            <div class="md:w-2/3">
                <span class="text-gray-600 font-bold">{{ $staffmember->permanent_address }}</span>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Department :
                </label>
            </div>
            <div class="md:w-2/3 block text-gray-600 font-bold">
                <span class="text-gray-600 font-bold">{{ $staffmember->department->department_name }}</span>
            </div>
        </div>
        
        
        
        

       

        
    </div>        
</div>