@extends('layouts.client.master')

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h2 class="text-white">Car Alignment Service Request</h2>
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
                                <legend class="w-auto">Alignment Service Details</legend>
                                <div class="form-group">
                                    <label for="alignment-type">Type of Alignment:</label>
                                    <select class="form-control" id="alignment-type" name="alignment-type" required>
                                        <option value="front">Front End Alignment</option>
                                        <option value="four-wheel">Four-Wheel Alignment</option>
                                        <option value="thrust">Thrust Alignment</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="alignment-date">Preferred Service Date:</label>
                                    <input type="date" class="form-control" id="alignment-date" name="alignment-date"
                                        required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="alignment-time">Preferred Service Time:</label>
                                    <input type="time" class="form-control" id="alignment-time" name="alignment-time"
                                        required>
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
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
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
