@extends('layouts.client.master')

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h2 class="text-white">Car Wash Service Request</h2>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <fieldset class="border p-4 mb-4">
                                <legend class="w-auto">Personal Information</legend>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="phone">Phone Number:</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="email">Email Address:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                            </fieldset>

                            <fieldset class="border p-4 mb-4">
                                <legend class="w-auto">Vehicle Information</legend>
                                <div class="form-group">
                                    <label for="make">Make:</label>
                                    <input type="text" class="form-control" id="make" name="make" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="model">Model:</label>
                                    <input type="text" class="form-control" id="model" name="model" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="year">Year:</label>
                                    <input type="number" class="form-control" id="year" name="year" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="license">License Plate Number:</label>
                                    <input type="text" class="form-control" id="license" name="license" required>
                                </div>
                            </fieldset>

                            <fieldset class="border p-4 mb-4">
                                <legend class="w-auto">Service Information</legend>
                                <div class="form-group">
                                    <label for="service-type">Service Type:</label>
                                    <select class="form-control" id="service-type" name="service-type" required>
                                        <option value="basic">Basic Wash</option>
                                        <option value="premium">Premium Wash</option>
                                        <option value="deluxe">Deluxe Wash</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="service-date">Preferred Service Date:</label>
                                    <input type="date" class="form-control" id="service-date" name="service-date"
                                        required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="service-time">Preferred Service Time:</label>
                                    <input type="time" class="form-control" id="service-time" name="service-time"
                                        required>
                                </div>
                                <div class="form-group mt-3">
                                    <label>Additional Services:</label><br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="interior-cleaning"
                                            name="additional-services" value="interior-cleaning">
                                        <label class="form-check-label" for="interior-cleaning">Interior Cleaning</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="wax"
                                            name="additional-services" value="wax">
                                        <label class="form-check-label" for="wax">Wax</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="engine-cleaning"
                                            name="additional-services" value="engine-cleaning">
                                        <label class="form-check-label" for="engine-cleaning">Engine Cleaning</label>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="comments">Comments/Additional Information:</label>
                                    <textarea class="form-control" id="comments" name="comments"></textarea>
                                </div>
                            </fieldset>

                            <fieldset class="border p-4 mb-4">
                                <legend class="w-auto">Appointment Confirmation</legend>
                                <div class="form-group">
                                    <label for="contact-method">Preferred Contact Method:</label>
                                    <select class="form-control" id="contact-method" name="contact-method" required>
                                        <option value="phone">Phone</option>
                                        <option value="email">Email</option>
                                    </select>
                                </div>
                                <div class="form-check  mt-3">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms"
                                        required>
                                    <label class="form-check-label" for="terms">I agree to the terms and
                                        conditions</label>
                                </div>
                            </fieldset>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
