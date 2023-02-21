# BotMan DialogFlowV2 Middleware

This Package is used to connect DialogFlowV2 with [BotMan](https://github.com/botman/botman). 

It is a drop-in replacement for the v1 Middleware.

It has been tested and is still working as of 2021 April.

All credit to [@eclips16](https://github.com/eclips16) and others who helped for making the dialogflowv2 updates. Due to their work not on the packgist, I wanted to help others by putting his contribution on the packgists. The code was sourced from his [pull request](https://github.com/botman/botman/pull/1010).

## Installation
#### Composer

```
composer require vincechen/botman-studio-dialogflow-v2
```

## Usage
### .env
``` dotenv
GOOGLE_CLOUD_PROJECT=project-id
GOOGLE_APPLICATION_CREDENTIALS=/path/to/security-file.json
```

### Where can I get these application credentials?
- https://cloud.google.com/dialogflow/es/docs/quick/setup#windows

## Security Vulnerabilities

If you discover a security vulnerability within BotMan, please send an e-mail to Marcel Pociot at m.pociot@gmail.com. All security vulnerabilities will be promptly addressed.

## License

BotMan is free software distributed under the terms of the MIT license.


