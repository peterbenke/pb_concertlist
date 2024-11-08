# TYPO3 Extension ``pb_concertlist`` 

## Introduction

This extension generates a list of concerts for bands


## Installation

- Download the extension and install it via composer
- Include the static Typoscript "Concert list (pb_concertlist)" in your template
- Go to the constant editor and input the pid (page uid) from the sysfolder, where the concerts are stored. (Otherwise select this sysfolder in your content plugin "Records Storage Page")
- If you want to create your own template, you can change the path to this template in the constant editor (“Path to template root (FE)”). Be sure that you have a folder named “Concert” within this path and in this folder a file named “List.html”.

Look at the original template, this will help you to create your own template:
EXT:pb_concertlist/Resources/Private/Templates/Concert/List.html

## Users manual

### Sysfolder

First you have to create a sysfolder. Edit the page properties and choose “Contains Plugin” =>
“Concertlist”. You don't have to do this, but your folder icon will change, so it looks more nice.

Create new records from the type “Concert”. You have the following fields:

- Title
- Date
- Location
- Address
- Description
- Private Concert (boolean)
- Maybe you have public and private concerts (Party Band)
- Status (planned, booked)
- Fee (maybe you have an internal page, were you want to list the fees for your concerts)
- Mark as new until (you can mark a concert as new for a specific time)
- Website (you can add any number of urls)


### Plugin

Now go to the page, where you want to display the concertlist and create a new content-element => plugin “Concertlist”. Set the values for your concertlist.
You have to input the pid (Page Id) of the sysfolder in the constant editor => See more in the chapter “Administration”.
Otherwise, select this sysfolder for the "Records Storage Page".

If you want to have different plugins on one page, you can style them with the following classes (see also source code):


| Css class   | Description                            |
|-------------|----------------------------------------|
| all         | All concerts                           |
| prospective | Only upcoming concerts                 |
| expired     | Only concerts in the past              |
| next        | Only the next concert                  |
| period      | Only concerts in a defined time period |



### Weekdays

You have the possibility to output weekdays. Use the following marker in your template:

**Short (Su, Mo, Tu,...)**

	<f:translate key="tx_pbconcertlist_domain_model_concert.weekday.short.{pb:weekday(date:concert.date)}" />

**Long (Sunday, Monday, Tuesday,...)**

	<f:translate key="tx_pbconcertlist_domain_model_concert.weekday.long.{pb:weekday(date:concert.date)}" />

If you would like to change the strings, just change the typoscript:

	plugin.tx_pbconcertlist{
		_LOCAL_LANG.de{
			# 0-6 (Sunday to Saturday)
			tx_pbconcertlist_domain_model_concert.weekday.long.0 = Long Version of Sunday
			tx_pbconcertlist_domain_model_concert.weekday.long.1 = Long Version of Monday
		}
	}

### Known problems

If you upgrade from a former TYPO3 version, it might be possible, that you have to create your plugin(s) new.
Maybe you have to include the static Typoscript again.

