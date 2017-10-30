.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _users-manual:

Users manual
============

Sysfolder
----------

First you have to create a sysfolder. Edit the page properties and choose “Contains Plugin” =>
“Concertlist”. You don't have to do this, but your folder icon will change, so it looks more nice.

Create new records from the type “Concert”. You have the following fields:

#. Title

#. Date

#. Location

#. Address

#. Description

#. Private Concert (Boolean)

#. Maybe you have public and private concerts (partyband)

#. Status (planned, booked)

#. Fee (Maybe you have an internally page, were you want to list the fees for your concerts)

#. Mark as new until (You can mark a concert as new for a specific time)

#. Website (You can add any number of Urls)



Plugin
----------

Now go to the page, where you want to display the concertlist and create a new content-element => plugin “Concertlist”. Set the values for your concertlist.
You have to input the pid (Page Id) of the sysfolder in the constant editor => See more in the chapter “Administration”.
Otherwise select this sysfolder for the  "Records Storage Page".

If you want to have different plugins on one page, you can style them with the following classes (see also source code):


=============  ======================================================
Css class      Description
=============  ======================================================
all            All concerts
prospective    Only upcoming concerts
expired        Only concerts in the past
next           Only the next concert
period         Only concerts in a defined time period
=============  ======================================================



Weekdays
----------

You have the possibility to output weekdays. Use the follwing marker in your template:

**Short (Su, Mo, Tu,...)**

::

	<f:translate key="tx_pbconcertlist_domain_model_concert.weekday.short.{pb:weekday(date:concert.date)}" />


**Long (Sunday, Monday, Tuesday,...)**

::

	<f:translate key="tx_pbconcertlist_domain_model_concert.weekday.long.{pb:weekday(date:concert.date)}" />


If you would like to change the strings, just change the typoscript:

::

	plugin.tx_pbconcertlist{
		_LOCAL_LANG.de{
			# 0-6 (Sunday to Saturday)
			tx_pbconcertlist_domain_model_concert.weekday.long.0 = Long Version of Sunday
			tx_pbconcertlist_domain_model_concert.weekday.long.1 = Long Version of Monday
		}
	}


