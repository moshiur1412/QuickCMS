# OWN CMS (Quick CMS)

Almost every IT firm have some offer a small personal website for blog commending or online product selling or any other service related small websites but most of the time, every IT Engineers are so much busy for their big project working with huge budget. On the other hand, a personal blog sites or product selling small websites and other service related websites are depending on very small budget within short time product delivery deadline. In this scenario, the company wants to develop a common platform for the current problem solutions. They want to make some common features such as user’s management, pages with posts creation and content managements within the based platform. The propose system is QUICKCMS which is enable that types of individual small websites with low costs and very quick product delivery. The company wants to make sure their own product for their branding and marketing which is achieved huge customers with big revenue into the small CMS development.

**Version**: 1.0 Release of the Quick CMS (OWN CMS).

---

## Table of Contents

- [Overview](#overview)
- [Problem Domain Area](#problem-Domain-Area)
- [The Advantages of System](#The-Advantages-of-System)
- [The Limitations of System](#The-Limitations-of-System)
- [The System Features List](#system-features-list)
- [Entity Relationship Diagram (ERD)](#Entity-Relationship-Diagram)
- [Technologies and Libraries](#technologies-and-libraries)
- [Further Development](#further-development)
- [How to run the System](#how-to-run-the-system)
- [Questions and Answers](#questions-and-answers)
- [Summary](#summary)
- [References](#references)

---

## Overview

Bangladesh is a developing country and IT is the most important part of this sector. Now IT businesses are increasing day by day with effective ways and active usability. At the same time, a user can manage his daily tasks, activates and business throughout the websites. A person can easily manage his contents with huge sharing within the digital content management, they can have used IT to create a new way for their products selling online and any kind of small organization service related content management within the short time and cost effectively. 

QuickCMS works on the content management system that is followed for the individual personal based web service with some user management which is manage the system administrator. The system also has some feature for create pages and blog sites which can be filtering by the 
category with dynamically.

## Problem Domain Area

- Mr. Derek Ashauer is the famous content writer and project manager, developer of
the AshWebStudio IT firm. He said that his blog “Last three months, many of our clients has been coming to us for updating their own websites and some clients are waiting for days/weeks on their web guy to make update their websites. Others make changes so frequently with hourly fees but if they have a content management system (Ashauer, 2009)”.

- Mr. Jon Mikel Bailey is the popular content writer he said that his articles about their
own experience sharing. “Content is king! Yes, it is very important, if you want to update your content each and every moment what will happen. First spend more money and second you will not publish good content as you should (Bailey & Jon-Mikel, 2013) “.

- Mr. Brent Summers is an effective and active content writer, he said that about the
CMS issues on his articles. “if the clients wants to version control for legal sensitives, wants an approval workflow for a massive editorial team, regularly press releases with serialized blogging post, if the clients want to provide search utility or any kinds of API supports and used the multiple language support (Summers, 2000)”..

## The Advantages of System

- The application is fully responsive.
- Authenticated by the security route such as web, active and current users based.
- validation and verification with relevant error and success message.
- Highly Modern EDGE Technology Used.
- Custom error messaging with custom error pages.

## The Limitations of System

- The system is not used highly graphics and best UX design.
- Any information can't modify within the single click.
- Users can't find their following twitch name in real time just like Twitch.
- The system didn't config any mailing system for notifications.

## Aims and Objectives

-The developer can easily customize the system and some features
development with modification within very short time.
- The system owner can use the system within very short time which is very
effective for their business goal achieve.
- The developer company (MDB) can promoted their banding name with huge
customer and market values.

## Entity-Relationship-Diagram

<!-- ![arc](erd_diagram.jpg?raw=true 'ERD_Diagram') -->

## Technologies and libraries

- Laravel 5+, PHP 7+.
- HTTP Client for JSON API.
- Bootstrap, SCSS, and default level layouts.
- MySQL for local, PgSQL for Heroku.
- jQuery, Ajax for validation and verification.

## Further Development

- Highly UX design with graphical and visual chart reports.
- Personal email processing within the mail notification system.
- Refresh the authentication token when it will be expired.
- Refactoring coding standard with live data loaded.
- Testing plan implements with PHPUnit tools.

## How to run the System

### Run on the development environment

- Open terminal window with your dev area
- Then run this below comments

```sh
$ git clone https://github.com/vorsurm/QuickCMS.git

$ cd QuickCMS
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ config .env file, below description
$ php artisan migrate
$ php artisan serve
$ It`s open a browser window with http://localhost:8000/login

```

### Configure environment variables

- Add the .env variable name of the following below information.

```

MySQL Config:
==============
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=qcms_db
DB_USERNAME=username
DB_PASSWORD=password


```

- Browser opens up and runs with URL: `http://localhost:8000`
- configure your own style .

---

## Questions and Answers

### Coming soon... 

## Summary

The project is completely developed by the target customer requirements and their
collaboration so the system value must be achieved. On the other hand, the system is
used to LARAVEL framework, which is update and upgradable for the future
challenges issue.

## References

- https://docs.aws.amazon.com/codedeploy/latest/userguide/welcome.html
- https://aws.amazon.com/blogs/startups/scaling-on-aws-part-3-500k-users
- https://laravel-json-api.readthedocs.io/en/latest/features/http-clients/
- https://socialiteproviders.netlify.com/providers/twitch.html
- https://www.quora.com/What-are-the-Laravel-best-practices
