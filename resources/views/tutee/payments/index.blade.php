@extends('layouts.main')

@section('content')
    <!-- Card Section -->
    <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <!-- Card -->
        <div class="rounded-xl bg-white p-4 shadow dark:bg-gray-800 sm:p-7">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 md:text-3xl">
                    Payment
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Manage your payment methods.
                </p>
            </div>

            <form action="{{route('payment.submit')}}" method="POST">
                @csrf
                @method('post')
                <!-- Billing Contact Section -->
                <div
                    class="border-t border-gray-200 py-6 first:border-transparent first:pt-0 last:pb-0 dark:border-gray-700">
                    <label for="af-payment-billing-contact"
                        class="inline-block text-sm font-medium text-gray-800 dark:text-gray-200">
                        Billing contact
                    </label>
                    <input type="text" name="payment_id" value="{{$payment->id}}" hidden>
                    <div class="mt-2 space-y-3">
                        <input id="af-payment-billing-contact" type="text"
                            class="block w-full rounded-lg border-gray-200 bg-white px-3 py-2 pe-11 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="First Name">
                        <input type="text"
                            class="block w-full rounded-lg border-gray-200 bg-white px-3 py-2 pe-11 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Last Name">
                        <input type="text"
                            class="block w-full rounded-lg border-gray-200 bg-white px-3 py-2 pe-11 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Phone Number">
                    </div>
                </div>
                <!-- End Billing Contact Section -->

                <!-- Payment Method Section -->
                <div
                    class="border-t border-gray-200 py-6 first:border-transparent first:pt-0 last:pb-0 dark:border-gray-700">
                    <label for="af-payment-payment-method"
                        class="inline-block text-sm font-medium text-gray-800 dark:text-gray-200">
                        Payment method
                    </label>
                    <div class="mt-2 space-y-3">
                        <input id="af-payment-payment-method" type="text"
                            class="block w-full rounded-lg border-gray-200 bg-white px-3 py-2 pe-11 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Name on Card">
                        <input type="text"
                            class="block w-full rounded-lg border-gray-200 bg-white px-3 py-2 pe-11 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                            placeholder="Card Number">
                        <div class="flex flex-col gap-3 sm:flex-row">
                            <input type="month"
                                class="block w-full rounded-lg border-gray-200 bg-white px-3 py-2 pe-11 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                                placeholder="Expiration Date">
                            <input type="password"
                                class="block w-full rounded-lg border-gray-200 bg-white px-3 py-2 pe-11 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                                placeholder="CVV Code">
                        </div>
                    </div>
                </div>
                <!-- End Payment Method Section -->

                <!-- Bank Options Section -->
                <div
                    class="border-t border-gray-200 py-6 first:border-transparent first:pt-0 last:pb-0 dark:border-gray-700">
                    <label class="inline-block text-sm font-medium text-gray-800 dark:text-gray-200">
                        Bank options
                    </label>
                    <div class="mt-2 flex flex-wrap gap-3">
                        <select class="w-full dark:bg-gray-900 rounded" name="bank_name" id="">
                            <option value="maybank">Malayan Bank</option>
                            <option value="cimb">CIMB Bank</option>
                            <option value="uob">UOB Bank</option>
                        </select>
                    </div>
                </div>
                <!-- End Bank Options Section -->

            <!-- Actions -->
            <div class="mt-5 flex justify-end gap-x-2">
                <button type="button"
                    class="inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 focus:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-800 dark:focus:bg-gray-800">
                    Cancel
                </button>
                <button type="submit"
                    class="inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:bg-blue-800">
                    Pay
                </button>
            </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
@endsection
