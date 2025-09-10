<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Inquiry</title>
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
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0 0 10px 0;
            font-size: 28px;
            font-weight: 600;
        }
        .header p {
            margin: 0;
            opacity: 0.9;
            font-size: 16px;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            color: #2d3748;
            margin-bottom: 20px;
        }
        .message-summary {
            background-color: #f7fafc;
            border-left: 4px solid #48bb78;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
        }
        .summary-title {
            font-weight: 600;
            color: #2d3748;
            margin: 0 0 10px 0;
        }
        .summary-content {
            color: #4a5568;
            font-size: 14px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 100px 1fr;
            gap: 8px;
            margin: 10px 0;
        }
        .info-label {
            font-weight: 600;
            color: #4a5568;
            font-size: 14px;
        }
        .info-value {
            color: #2d3748;
            font-size: 14px;
        }
        .next-steps {
            background-color: #edf2f7;
            padding: 25px;
            border-radius: 8px;
            margin: 25px 0;
        }
        .next-steps h3 {
            margin: 0 0 15px 0;
            color: #2d3748;
            font-size: 18px;
        }
        .next-steps ul {
            margin: 0;
            padding-left: 20px;
            color: #4a5568;
        }
        .next-steps li {
            margin-bottom: 8px;
        }
        .contact-info {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 8px;
            margin: 25px 0;
            text-align: center;
        }
        .contact-info h3 {
            margin: 0 0 15px 0;
            font-size: 18px;
        }
        .contact-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 15px;
        }
        .contact-link {
            color: white;
            text-decoration: none;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            transition: background-color 0.2s;
        }
        .contact-link:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }
        .footer {
            background-color: #f7fafc;
            padding: 25px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            color: #718096;
        }
        .footer p {
            margin: 0 0 10px 0;
            font-size: 14px;
        }
        .footer .signature {
            font-style: italic;
            color: #4a5568;
            margin-top: 15px;
        }
        .social-links {
            margin: 20px 0;
        }
        .social-link {
            display: inline-block;
            margin: 0 10px;
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
        }
        .portfolio-cta {
            text-align: center;
            margin: 30px 0;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .cta-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }
            .content {
                padding: 25px 20px;
            }
            .header {
                padding: 30px 20px;
            }
            .contact-links {
                flex-direction: column;
                align-items: center;
            }
            .info-grid {
                grid-template-columns: 1fr;
                gap: 5px;
            }
            .info-label {
                border-bottom: 1px solid #e2e8f0;
                padding-bottom: 2px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="email-wrapper">
            <!-- Header -->
            <div class="header">
                <h1>✅ Thank You!</h1>
                <p>Your message has been received successfully</p>
            </div>

            <!-- Content -->
            <div class="content">
                <!-- Greeting -->
                <div class="greeting">
                    Hi {{ $contactData['name'] }},
                </div>

                <p style="color: #4a5568; font-size: 16px; line-height: 1.6;">
                    Thank you for reaching out through my portfolio website. I appreciate your interest in working together and I'm excited to learn more about your {{ strtolower(str_replace('_', ' ', $contactData['subject'])) }}.
                </p>

                <!-- Message Summary -->
                <div class="message-summary">
                    <div class="summary-title">📋 Your Inquiry Summary</div>
                    <div class="summary-content">
                        <div class="info-grid">
                            <div class="info-label">Subject:</div>
                            <div class="info-value">{{ ucfirst(str_replace('_', ' ', $contactData['subject'])) }}</div>
                            
                            <div class="info-label">Submitted:</div>
                            <div class="info-value">{{ now()->format('F j, Y \a\t g:i A') }}</div>
                            
                            @if(!empty($contactData['phone']))
                            <div class="info-label">Phone:</div>
                            <div class="info-value">{{ $contactData['phone'] }}</div>
                            @endif
                        </div>
                        
                        <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #e2e8f0;">
                            <div class="info-label" style="margin-bottom: 5px;">Your Message:</div>
                            <div style="font-style: italic; color: #4a5568; line-height: 1.5;">
                                "{{ Str::limit($contactData['message'], 150) }}"
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Next Steps -->
                <div class="next-steps">
                    <h3>🚀 What Happens Next?</h3>
                    <ul>
                        <li><strong>Response Time:</strong> I'll review your inquiry and respond within 24 hours during business days</li>
                        <li><strong>Initial Discussion:</strong> I may suggest a brief call or video meeting to better understand your needs</li>
                        <li><strong>Project Assessment:</strong> If it's a good fit, I'll provide a detailed proposal outlining scope, timeline, and investment</li>
                        <li><strong>Collaboration:</strong> Once we agree on terms, we can begin working together to bring your project to life</li>
                    </ul>
                </div>

                <!-- Portfolio CTA -->
                <div class="portfolio-cta">
                    <p style="color: #4a5568; margin-bottom: 20px;">
                        While you wait, feel free to explore more of my work and learn about my experience:
                    </p>
                    <a href="{{ url('/') }}" class="cta-button">
                        🏗️ View My Portfolio
                    </a>
                </div>

                <!-- Contact Information -->
                <div class="contact-info">
                    <h3>📞 Need to Reach Me Directly?</h3>
                    <p style="margin: 0 0 10px 0; opacity: 0.9;">
                        If your project is urgent or you have additional questions, feel free to contact me directly:
                    </p>
                    
                    <div class="contact-links">
                        @if($contactEmail = getSetting('contact_email'))
                            <a href="mailto:{{ $contactEmail }}" class="contact-link">
                                📧 {{ $contactEmail }}
                            </a>
                        @endif
                        
                        @if($contactPhone = getSetting('contact_phone'))
                            <a href="tel:{{ $contactPhone }}" class="contact-link">
                                📱 {{ $contactPhone }}
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Additional Information -->
                <div style="background-color: #fff5f5; border-left: 4px solid #f56565; padding: 20px; border-radius: 0 8px 8px 0; margin: 25px 0;">
                    <h4 style="margin: 0 0 10px 0; color: #c53030;">⚡ For Urgent Projects</h4>
                    <p style="margin: 0; color: #4a5568; font-size: 14px;">
                        If your project has a tight deadline or is time-sensitive, please mention "URGENT" in any follow-up communications so I can prioritize your inquiry accordingly.
                    </p>
                </div>

                <!-- Closing -->
                <p style="color: #4a5568; font-size: 16px; line-height: 1.6; margin-top: 30px;">
                    I look forward to learning more about your project and discussing how my civil engineering expertise can help you achieve your goals. Thank you again for considering me for your project!
                </p>
            </div>

            <!-- Footer -->
            <div class="footer">
                <p>
                    <strong>{{ getSetting('site_name', 'Civil Engineering Portfolio') }}</strong>
                </p>
                <p>
                    Professional Civil Engineering Services
                </p>
                
                <!-- Social Links -->
                <div class="social-links">
                    @if($linkedin = getSetting('social_linkedin'))
                        <a href="{{ $linkedin }}" class="social-link" target="_blank">LinkedIn</a>
                    @endif
                    @if($twitter = getSetting('social_twitter'))
                        <a href="{{ $twitter }}" class="social-link" target="_blank">Twitter</a>
                    @endif
                    @if($facebook = getSetting('social_facebook'))
                        <a href="{{ $facebook }}" class="social-link" target="_blank">Facebook</a>
                    @endif
                </div>

                <div class="signature">
                    <p>Best regards,<br>
                    <strong>{{ getSetting('site_owner_name', 'Civil Engineer') }}</strong></p>
                </div>

                <p style="font-size: 12px; margin-top: 20px; opacity: 0.7;">
                    This is an automated response to confirm receipt of your message.<br>
                    Please do not reply to this email directly.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
