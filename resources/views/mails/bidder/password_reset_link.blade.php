@component('mail::message')
# Bidder Password Reset

Click the link below to reset your password:

{{ $bidder->getPasswordResetUrl(86400) }}

The link will expire in 24 hours since the request
@endcomponent
