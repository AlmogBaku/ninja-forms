import Edit, { ChooseForm } from "./Edit";
import { render, fireEvent } from "@testing-library/react";
import forms from "./forms.fixture.js";

describe("Form block Edit callback", () => {
	it("Renders placeholder", () => {
		const setAttributes = jest.fn();

		const { container } = render(
			<Edit
				setAttributes={setAttributes}
				formTitle={"Real Form"}
				forms={forms}
			/>
		);
		expect(container.querySelectorAll(".components-placeholder").length).toBe(
			1
		);
		expect(container).toMatchSnapshot();
	});

	//Skipped beacuse generates error without WordPress
	//Is it worth mocking <ServerSideRender /> ?
	it.skip("Renders form preview", () => {
		const setAttributes = jest.fn();

		const { container } = render(
			<Edit
				setAttributes={setAttributes}
				formTitle={"Real Form"}
				formId={"2"}
				forms={forms}
			/>
		);
		expect(container.querySelectorAll(".components-placeholder").length).toBe(
			0
		);
		expect(container).toMatchSnapshot();
	});

	it("Calls setAttributes when changing form", () => {
		const setAttributes = jest.fn();
		const { getByLabelText } = render(
			<Edit
				setAttributes={setAttributes}
				formTitle={""}
				formId={""}
				forms={forms}
			/>
		);

		fireEvent.change(getByLabelText("Choose Form"), {
			target: { value: "3" }
		});
		expect(setAttributes).toBeCalledTimes(1);
		expect(setAttributes).toBeCalledWith({
			formId: "3",
			formTitle: "Unreal Form"
		});
	});
});
