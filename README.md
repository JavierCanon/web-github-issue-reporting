# web-github-issue-reporting
Simple (KISS) user friendly webpage to report a GitHub issue,
with DB backup in SQlite.

- Responsive with Bootstrap 4.
- User Antispam and Google Score Antispam
- Copy to web server, edit config vars, and run.  


## Philosophy of Javier Cañon
* KISS by design and programming. An acronym for "keep it simple, stupid" or "keep it stupid simple", is a design principle. The KISS principle states that most systems work best if they are kept simple rather than made complicated; therefore, simplicity should be a key goal in design, and unnecessary complexity should be avoided. Variations on the phrase include: "Keep it simple, silly", "keep it short and simple", "keep it simple and straightforward", "keep it small and simple", or "keep it stupid simple".

* Select the best tools for the job, use tools that take less time to finish the job.
* Productivity over complexity and avoid unnecessary complexity for elegant or beauty code.

* Computers are machines, more powerful every year, give them hard work, concentrate on being productive.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

```
PHP >= 5.6
Sqlite 3
Google Recaptcha v3 Keys
Github Project
```

### Installing

A step by step series of examples that tell you how to get a development env running

1. Copy the folder to subdirectory/subdomain.
2. Go to Google and register the website to get [Recaptcha](https://www.google.com/recaptcha/admin#list)
3. Config de app:

```
3.1 put Google Recaptcha v3 keys in config.php file
3.2 in header of index.php set Github user data:
$GithubUsernameToken = "YourAuthorizationToken";
$GithubUsername = "YourUsername";
$GithubRepository = "TheFullNameOfYourRepository";
```

#### Screenshots

![](docs/img/screenshot-localhost-37944-2019.01.17-18-42-05.png?raw=true)

## Running the tests

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* Microsoft Visual Studio 2019


## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* [Javier Cañon](https://www.javiercanon.com)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

---
Made with ❤️ by [Javier Cañon](https://www.javiercanon.com).

