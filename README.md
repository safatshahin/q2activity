# Question2Activity - A Moodle Question Bank Plugin

## Description
Question2Activity (q2activity) is a plugin for the Moodle LMS that extends the functionality of the Question Bank question management page. This plugin adds the option for users to select individual or multiple questions and add them right to an activity of their choosing, without having to access that individual activities management page.

---

## Installation Instructions
_Follow these steps to install Question2Activity:_
1. Download the plugin to the ___{moodle install directory}/question/bank/___ directory as a new folder called ___q2activity___. This can be done in either of the following ways:
    - With Git from within the _/question/bank_ directory, running the following command: 
        ```
        git clone https://github.com/3ark91/q2activity.git q2activity
        ```
    - Or by downloading the code manually from https://github.com/3ark91/q2activity and extracting it to the _question/bank_ directory.

2. Access the Admin Dashboard from your Moodle site to automatically trigger the install.

---

## Usage
To use the plugin, simply navigate to the QBank question management page and do either of the following:

### Individual Questions
- You can choose to add a single question to an activity by selecting the __Add to Quiz__ option from the actions column. Follow the on-screen instructions to select the activity to add the question to.

### Multiple Questions
- You can choose to add multiple questions to an activity by first selecting the check boxes of the questions you wish to add, and then choosing the __Add to Quiz__ option from the bulk actions drop down beneath the list of questions. Follow the on-screen instructions to select the activity to add the questions to.

---

<br />

# Handover Instructions For Other Developers

## Documentation
Question2Activity has two forms of documentation - external and inline.

- Detailed external documentation about the code of the plugin can be found here: https://docs.google.com/document/d/1eNajk8SaaECbX7h-c0NJrOrlYEBITl4Jvr4_zETAtxg/edit?usp=sharing

- Detailed inline comments (such as function headers and descriptions) can be found in the code. This has been done with phpDoc and is to Moodle Community Standards.

---

## Tasks Remaining
The following tasks/issues/requirements specified by the client remain to be completed:
- Currently the plugin only allows users to add questions to activities within a course that has the course ID of 2. That is, the plugin is currently hard coded to only work with a single course. The plugin needs to be extended so that it can determine the courses that the current user has access to and then pull a list of activities from all of those courses. This would be a good opportunity to setup user permissions. A permission example could be _q2activity:AddToAllCourses_.

- The plugin currently only allows users to add questions to quiz activities. This will need to be expanded to include more activity types. Initially it was intended that the plugin would get a list of all activities within a course that implement the QBank API, however this proved to be very difficult. At present, the plugin gets a list all activities within a course and filters out only the quiz activities. A settings page could be implemented in which the user enters all the activity types they want to be able to add questions to, and then the plugin filters course activities for these. Take care, however, as each of these different activity types will likely have unique ways of adding questions to them.

- Further unit testing of methods is needed in order to increase code test coverage.

- End to end tests are required for UI elements.

- The quiz_add_to_quiz function sometimes throws a strange warning about a parameter not being found, but it does still add the given question to the quiz. This needs to be looked into/fixed.

---

## Notes

- Moodle is a very unique environment. It's likely that it's going to be nothing like what you've worked with before. As such, it's highly reccomended that you do the Moodle Developer course at https://moodle.academy/. This will help bring you up to speed with the environment.

- Documentation about Moodle itself, especially Moodle 4.0 and Question Bank, can be very difficult to find and is almost impossible to search. Hopefully this improves in time. In order to understand what's actually going on you're going to have to dig through code of various other plugins. Don't feel disheartened if things are taking longer to get working, it's a very complicated environment with immense amounts of domain knowledge required to be efficient.
