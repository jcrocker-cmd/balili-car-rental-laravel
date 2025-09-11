<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Monthly Booking Form</title>
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
                                width="150" alt="Logo">
                            <h5 style="font-size: 18px; margin: 5px 0 5px; color:#000;">
                                Monthly Booking Form
                            </h5>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                                style="font-size: 12px; border:1px solid #1e453e; border-collapse:collapse;">
                                <thead>
                                    <tr style="background:#1e453e; color:#fff;">
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

                                <thead class="table-info" style="background: #1e453e; border:1px solid #1e453e; 
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

                                <thead class="table-info" style="background: #1e453e; border:1px solid #1e453e; 
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


                                <thead class="table-info" style="background: #1e453e; border:1px solid #1e453e;
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

                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                        style="background-color:#f0f0f0;">
                        <tr>
                            <td style="text-align:center; padding:20px; font-size:12px; color:#777; line-height:1.6;">
                                &copy; 2020 Cebu Rent N' Drive. All rights reserved.<br><br>

                                If you have any questions, contact us at
                                <a href="mailto:marzbalskie@gmail.com" style="color:#777; text-decoration: underline;">
                                    marzbalskie@gmail.com
                                </a> <br>
                                or WhatsApp/Viber:
                                <span style="color:#777; text-decoration: underline;">
                                    +639771763187
                                </span>
                                <br><br>

                                You're receiving this email because you made a booking request with us.
                                <br><br>
                                <table role="presentation" cellpadding="0" cellspacing="0" align="center">
                                    <tr>
                                        <td style="padding: 0 8px;">
                                            <a href="https://goo.gl/maps/yourmaplink" target="_blank">
                                                <img src="https://img.icons8.com/ios-filled/30/0C605C/marker.png"
                                                    alt="Map" width="24" border="0" style="display:block;">
                                            </a>
                                        </td>
                                        <td style="padding: 0 8px;">
                                            <a href="https://facebook.com/yourpage" target="_blank">
                                                <img src="https://img.icons8.com/ios-filled/30/0C605C/facebook-new.png"
                                                    alt="Facebook" width="24" border="0" style="display:block;">
                                            </a>
                                        </td>
                                        <td style="padding: 0 8px;">
                                            <a href="https://yourwebsite.com" target="_blank">
                                                <img src="https://img.icons8.com/ios-filled/30/0C605C/domain.png"
                                                    alt="Website" width="24" border="0" style="display:block;">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>