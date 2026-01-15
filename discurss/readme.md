# README

## What's this?

An RSS driven conversation thread centered around a admin set daily topic. Each time a user submits a reply to the topic, it's added to the RSS feed. When an admin sets a new topic, the RSS feed is reset with a single entry about the new topic.

- A daily topic gets set by an admin
- The topic and last reply are shown to a user
- The user submits a new reply and it's added to the RSS feed
- The RSS feed keeps the last 50 replies and is wiped when a new topic is set

## File Structure

| - rss.xml     The live updated RSS 2.0 feed
| - index.php   Displays a form to the user for submitting a new comment. Fields are "Comment" (text area, max length 500) and "Display Name" (text, max length 100). The user is shown the current topic and the last reply. On submit, form data is posted to `post.php`. 
| - post.php    Prepends the submitted form data to `rss.xml`, includes "Display Name" as the author, the current timestamp for entry time and the "Comment" as the contents. Title is "RE: {TOPIC}". Ensure all fields are filled out and do not exceed max length. Returns a "Thank you for submitting your reply" message on success, or redirects back to `index.php` on error.
| - admin.php   Shows a form for setting a new topic. Includes the title of the current topic and the number of replies. On submit, form dats is posted to `topic.php`. The form includes "Topic" (textarea, max length 200) and "Password" (password input, max length 30).
| - topic.php   Clears the RSS feed, and adds a new entry for the newly submitted topic. This entry is always the oldest entry in the RSS feed so that the current topic can be parsed by `index.php` and `admin.php`. The submitted "Password" must match the hard coded password in the `.env` file in the same directory. Ensure all fields are filled out and do not exceed max length. Returns a "New topic posted" on success or redirects to `admin.php` on error.
| - .env        Contains a hard coded admin password

## Development notes

- No external libraries
- No JavaScript
- Minimal CSS styling
- No database, all data is maintained in the `rss.xml` file
