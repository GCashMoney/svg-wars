Central College News Wordpress Theme
===================

A WordPress theme for News at Central College (news.central.edu)

Sections
------------------

The site is divided into three sections:

- Feature stories (posts)
- In the News
- News Releases

Feature stories use the posts and the remaining stories use custom post types. The "In the News" section requires additional custom_metadata to be included with the post.

Arts Beat
------------------

The arts beat section of the theme is designed to be used as an email archive for the events that are happening in the Fine Arts at Central. The archive is available publicly and the emails are accessible individually. 

Users can use the dashboard widget to send emails using the list that is in the C2AP news app. The sending portion is completed via www.central.edu/api/wp-email and is verified using a UUID.

Story Aggregrator
------------------

The Central College story aggregrator scans this site every hour looking for new stories to be used on www.central.edu. Stories that include a featured photo will be emailed to the Admission staff and the Central Communications staff.

bigImage shortcode
------------------

This theme includes a shortcode that allows for a full bleed photo to be used with stories.

- Syntax: `[bigimage caption="" showcaption="yes|no" imageURL="[Full URL to image]"]`
- Required fields: caption and imageURL.

Example: `[bigImage caption="Students being active and connected on their Global Learning Experience." showCaption="yes" imageURL="http://www.central.edu/global-experiential-learning/images/GELPhoto1.jpg"]`#   s v g - w a r s  
 