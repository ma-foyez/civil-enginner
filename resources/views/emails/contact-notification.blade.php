<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .email-wrapper {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .content {
            padding: 30px;
        }
        .section {
            margin-bottom: 25px;
        }
        .section h2 {
            color: #4a5568;
            font-size: 18px;
            margin: 0 0 10px 0;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 5px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 10px;
            margin-bottom: 15px;
        }
        .info-label {
            font-weight: 600;
            color: #4a5568;
        }
        .info-value {
            color: #2d3748;
        }
        .message-box {
            background-color: #f7fafc;
            border-left: 4px solid #667eea;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 15px 0;
        }
        .message-text {
            margin: 0;
            white-space: pre-wrap;
            line-height: 1.6;
        }
        .footer {
            background-color: #f7fafc;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            font-size: 14px;
            color: #718096;
        }
        .timestamp {
            background-color: #edf2f7;
            padding: 10px;
            border-radius: 6px;
            font-size: 14px;
            color: #4a5568;
            text-align: center;
            margin-top: 20px;
        }
        .urgent {
            background-color: #fed7d7;
            border-left-color: #e53e3e;
        }
        .urgent .info-label {
            color: #c53030;
        }
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }
            .content {
                padding: 20px;
            }
            .header {
                padding: 20px;
            }
            .info-grid {
                grid-template-columns: 1fr;
                gap: 5px;
            }
            .info-label {
                border-bottom: 1px solid #e2e8f0;
                padding-bottom: 2px;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="email-wrapper">
            <!-- Header -->
            <div class="header">
                <h1>🏗️ New Contact Form Submission</h1>
                <p style="margin: 10px 0 0 0; opacity: 0.9;">Civil Engineering Portfolio Website</p>
            </div>

            <!-- Content -->
            <div class="content">
                <!-- Contact Information -->
                <div class="section">
                    <h2>📋 Contact Information</h2>
                    
                    <div class="info-grid">
                        <div class="info-label">Name:</div>
                        <div class="info-value">{{ $contactData['name'] }}</div>
                        
                        <div class="info-label">Email:</div>
                        <div class="info-value">
                            <a href="mailto:{{ $contactData['email'] }}" style="color: #667eea; text-decoration: none;">
                                {{ $contactData['email'] }}
                            </a>
                        </div>
                        
                        @if(!empty($contactData['phone']))
                        <div class="info-label">Phone:</div>
                        <div class="info-value">
                            <a href="tel:{{ $contactData['phone'] }}" style="color: #667eea; text-decoration: none;">
                                {{ $contactData['phone'] }}
                            </a>
                        </div>
                        @endif
                        
                        <div class="info-label">Subject:</div>
                        <div class="info-value">
                            <strong>{{ ucfirst(str_replace('_', ' ', $contactData['subject'])) }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Message -->
                <div class="section">
                    <h2>💬 Message</h2>
                    <div class="message-box {{ in_array($contactData['subject'], ['urgent', 'emergency']) ? 'urgent' : '' }}">
                        <p class="message-text">{{ $contactData['message'] }}</p>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="section">
                    <h2>🔍 Additional Details</h2>
                    
                    <div class="info-grid">
                        <div class="info-label">Submitted:</div>
                        <div class="info-value">{{ now()->format('F j, Y \a\t g:i A T') }}</div>
                        
                        <div class="info-label">IP Address:</div>
                        <div class="info-value">{{ request()->ip() }}</div>
                        
                        <div class="info-label">User Agent:</div>
                        <div class="info-value" style="font-size: 12px; color: #718096;">
                            {{ request()->userAgent() }}
                        </div>
                    </div>
                </div>

                <!-- Action Items -->
                <div class="section">
                    <h2>📌 Next Steps</h2>
                    <ul style="margin: 0; padding-left: 20px; color: #4a5568;">
                        <li>Review the inquiry and assess project requirements</li>
                        <li>Respond to {{ $contactData['name'] }} within 24 hours</li>
                        <li>Schedule a consultation call if appropriate</li>
                        <li>File this inquiry in your CRM system</li>
                    </ul>
                </div>

                <!-- Quick Response -->
                <div style="text-align: center; margin: 30px 0;">
                    <a href="mailto:{{ $contactData['email'] }}?subject=Re: {{ ucfirst(str_replace('_', ' ', $contactData['subject'])) }} - Your Inquiry&body=Hi {{ $contactData['name'] }},%0A%0AThank you for reaching out regarding your {{ strtolower(str_replace('_', ' ', $contactData['subject'])) }}. I appreciate your interest in working together.%0A%0A" 
                       style="display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; font-weight: 600; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                        📧 Reply to {{ $contactData['name'] }}
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <p style="margin: 0 0 10px 0;">
                    This email was automatically generated from your portfolio website contact form.
                </p>
                <p style="margin: 0; font-size: 12px;">
                    Submission ID: {{ md5($contactData['email'] . $contactData['name'] . now()->timestamp) }}
                </p>
            </div>
        </div>

        <!-- Timestamp -->
        <div class="timestamp">
            Generated on {{ now()->format('F j, Y \a\t g:i:s A T') }}
        </div>
    </div>
</body>
</html>
