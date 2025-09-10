<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daily Booking Form</title>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600"
                    style="background: #ffffff;">
                    <tr>
                        <td align="center" style="padding: 20px;">
                            <img src="https://res.cloudinary.com/dnh4lkqlw/image/upload/v1757495629/LOGO_f1gfc4.png"
                                width="200" alt="Logo">
                            <h5 style="font-size: 24px; margin: 5px 0 5px; color:#003049;">
                                Daily Booking Form
                            </h5>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 20px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                                style="font-size: 14px; border:1px solid #003049; border-collapse:collapse;">
                                <thead>
                                    <tr style="background:#003049; color:#fff;">
                                        <th align="left" style="padding:10px; display: flex;">Renter Information</th>
                                        <th style="padding:10px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="padding: 10px; ">Full Name</td>
                                        <td style="padding: 10px; "> {!! $data['name'] !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; ">Contact Email</td>
                                        <td style="padding: 10px; ">{!! $data['con_email'] !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; ">Whatsapp/Viber</td>
                                        <td style="padding: 10px; ">{!! $data['con_num'] !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; ">Address</td>
                                        <td style="padding: 10px; ">{!! $data['address'] !!}</td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 10px; ">Message (Optional)</td>
                                        <td style="padding: 10px; ">{!! $data['msg'] !!}</td>
                                    </tr>
                                </tbody>

                                <thead class="table-info" style="background: #003049; border:1px solid #003049; 
                                      color: white;
                                      ">
                                    <tr>
                                        <th style="padding: 10px; text-align: left;" colspan="2">Car Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="padding: 10px; ">Brand</td>
                                        <td style="padding: 10px; ">{!!
                                            $data['car_details']->brand !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; ">Model</td>
                                        <td style="padding: 10px; ">{!!
                                            $data['car_details']->model !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; ">Vehicle type</td>
                                        <td style="padding: 10px; ">{!!
                                            $data['car_details']->vehicle !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; ">Year Model</td>
                                        <td style="padding: 10px; ">{!! $data['car_details']->year
                                            !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; ">Transmission</td>
                                        <td style="padding: 10px; ">{!!
                                            $data['car_details']->transmission !!}</td>
                                    </tr>
                                </tbody>

                                <thead class="table-info" style="background: #003049; border:1px solid #003049; 
                                      color: white;
                                      ">
                                    <tr>
                                        <th style="padding: 10px; text-align: left;" colspan="2">Reservation Details
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="padding: 10px; ">Start Date</td>
                                        <td style="padding: 10px; ">{!! date('F j, Y',
                                            strtotime(date('Y-m-d',
                                            strtotime($data['start_date'])))) !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; ">Start Time</td>
                                        <td style="padding: 10px; ">{!! date('h:i A',
                                            strtotime($data['start_time'])) !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; ">Return Date</td>
                                        <td style="padding: 10px; ">{!! date('F j, Y',
                                            strtotime(date('Y-m-d',
                                            strtotime($data['return_date'])))) !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; ">Return Time</td>
                                        <td style="padding: 10px; ">{!! date('h:i A',
                                            strtotime($data['return_time']))
                                            !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; ">Mode of Delivery</td>
                                        <td style="padding: 10px; ">{!! $data['mode_del'] !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; ">Rental Duration</td>
                                        <td style="padding: 10px; ">{!! $data['rental_duration']
                                            !!}</td>
                                    </tr>
                                </tbody>


                                <thead class="table-info" style="background: #003049; border:1px solid #003049;
                                      color: white;
                                      ">
                                    <tr>
                                        <th style="padding: 10px; text-align: left;" colspan="2">Payment Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="padding: 10px; ">Payment Method</td>
                                        <td style="padding: 10px; ">{!! $data['payment'] !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; ">Total Amount Payable</td>
                                        <td style="padding: 10px; ">₱ {!!
                                            number_format($data['total_amount_payable'], 2)
                                            !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f0f0f0;">
          <tr>
            <td style="text-align:center; padding:20px; font-size:12px; color:#777;">
              &copy; 2024 Balili Car Rental. All rights reserved.<br>
              If you have any questions, contact us at 
              <a href="mailto:marzbalskie@gmail.com" 
                style="color:#777; text-decoration: underline;">
                marzbalskie@gmail.com
              </a>.<br>
              You're receiving this email because you made a booking request with us.
            </td>
          </tr>
        </table>
        </td>
        </tr>
    </table>
</body>

</html>