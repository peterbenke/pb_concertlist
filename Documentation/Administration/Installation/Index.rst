.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _administration-installation:

Installation
============

#. Download the extension and install it with the extension manager or install it via composer

#. Include the static Typoscript "pb_concertlist" in your template

#. Go to the constant editor and input the pid (page Id) from the sysfolder, where the concerts are stored. (Otherwise select this sysfolder in your content plugin "Records Stora Page")

#. If you want to create your own template, you can change the path to this template in the constant editor (“Path to template root (FE)”). Be sure that you have a folder named “Concert” within this path and in this folder a file named “List.html”.

Example:
You change the path to: “fileadmin/templates/extension/”. Then your template has to be
here: “fileadmin/templates/extension/Concert/List.html”.

Look at the original template, this will help you to create your own template:
EXT:pb_concertlist/Resources/Private/Templates/Concert/List.html